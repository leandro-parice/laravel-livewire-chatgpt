<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ChatInput extends Component
{
    public $message;
    public $loading = false;

    public function updatedMessage($value)
    {
        if (trim($value) === '') {
            $this->message = '';
        }
    }

    public function askChatGPT(array $history)
    {
        $systemMessage = session()->get('message', 'Você é um atendente educado e simpático que responde em português.');
        array_unshift($history, [
            'role' => 'system',
            'content' => $systemMessage,
        ]);
        
        $apiKey = env('OPENAI_API_KEY');
        $response = Http::withToken($apiKey)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4o',
                'messages' => $history,
            ]);

        if ($response->successful()) {
            return $response->json('choices.0.message.content') ?? 'Sem resposta.';
        }

        return 'Erro ao conectar com o ChatGPT: ' . $response->body();
    }

    public function saveMessage()
    {
        $currentMessage = $this->message;

        if (!empty(trim($currentMessage))) {
            $this->loading = true;

            try {
                $history = session()->get('history', []);
                
                $userMessage = [
                    'role' => 'user',
                    'content' => $currentMessage,
                    'timestamp' => now()->format('H:i:s'),
                ];
                $history[] = $userMessage;
                
                $apiHistory = collect($history)->map(function ($item) {
                    return ['role' => $item['role'], 'content' => $item['content']];
                })->toArray();
                
                $chatGptResponse = $this->askChatGPT($apiHistory);
                
                $chatGptMessage = [
                    'role' => 'assistant',
                    'content' => $chatGptResponse,
                    'timestamp' => now()->format('H:i:s'),
                ];
                $history[] = $chatGptMessage;
                
                session()->put('history', $history);
            } catch (\Exception $e) {
                $this->dispatch('error', 'Ocorreu um erro: ' . $e->getMessage());
            } finally {
                $this->loading = false;
            }
            
            $this->message = '';
            
            $this->dispatch('messageAdded');
        }
    }

    public function render()
    {
        return view('livewire.chat-input');
    }
}

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('OPENAI_API_KEY');
    }

    public function askChatGPT(string $message)
    {
        $response = Http::withToken($this->apiKey)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4o',
                'messages' => [
                    ['role' => 'system', 'content' => 'Você é um atendente educado e simpático que vai esclarecer dúvidas sobre uma viagem que os usuários vão fazer no dia 01/01/2025 para o Rio de Janeiro. Responda somete sobre esse assunto, caso contrário, fale que você não tem autorização para responder.'],
                    ['role' => 'user', 'content' => $message],
                ],
            ]);

        if ($response->successful()) {
            return $response->json('choices.0.message.content') ?? 'Sem resposta.';
        }

        return 'Erro ao conectar com o ChatGPT: ' . $response->body();
    }
}
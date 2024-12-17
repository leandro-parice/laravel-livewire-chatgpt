<?php

namespace App\Livewire;

use Livewire\Component;

class ChatHistory extends Component
{
    public $history = [];

    protected $listeners = [
        'messageAdded' => 'updateHistory',
        'sessionCleared' => 'loadHistory'
    ];

    public function mount()
    {
        $this->loadHistory();
    }

    public function updateHistory()
    {
        $this->history = session()->get('history', []);
    }

    public function loadHistory()
    {
        $this->history = session()->get('history', []);
    }

    public function render()
    {
        return view('livewire.chat-history');
    }
}

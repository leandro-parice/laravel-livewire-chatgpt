<?php

namespace App\Livewire;

use Livewire\Component;

class AssistentConfig extends Component
{
    public $message;

    public function mount()
    {
        $this->message = session()->get('message', '');
    }

    public function saveMessage()
    {
        session()->put('message', $this->message);
    }

    public function render()
    {
        return view('livewire.assistent-config');
    }
}

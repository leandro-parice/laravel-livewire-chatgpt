<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class ClearSession extends Component
{
    public function clearChat()
    {
        Session::forget('history');
        $this->dispatch('sessionCleared');
    }
    
    public function render()
    {
        return view('livewire.clear-session');
    }
}

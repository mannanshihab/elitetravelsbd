<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Agents List')]
class AgentsList extends Component
{
    public function render()
    {   
        return view('livewire.agents-list');
    }
}

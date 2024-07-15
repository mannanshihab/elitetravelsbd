<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Add Agents')]
class AddAgents extends Component
{
    public function render()
    {
        return view('livewire.add-agents');
    }
}

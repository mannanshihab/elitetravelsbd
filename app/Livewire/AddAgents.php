<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Add Agents')]
class AddAgents extends Component
{
    public $bankNames = '';
    public function addBankNameField()
    {
        $this->bankNames .= ' <div class="input-group">';
        $this->bankNames .= ' <span class="input-group-text">Banks</span>';
        $this->bankNames .= ' <textarea class="form-control" rows="6" aria-label="With textarea"></textarea>';
        $this->bankNames .= '</div>';
    }

    public function render()
    {
        return view('livewire.add-agents');
    }
}

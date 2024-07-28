<?php

namespace App\Livewire;

use App\Models\Agent;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Add Invoice')]
class AddInvoice extends Component
{

    function CustomerData()
    {
        return 'test';
    }

    public function render()
    {
        $agents = Agent::get();
        return view('livewire.add-invoice', ['agents' => $agents]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Agent;
use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\Title;
#[Title('Add Invoice')]
class AddInvoice extends Component
{

    public $agents;
    public $customers;


    public function mount()
    {
        $this->customers = Customer::get();
        $this->agents = Agent::get();
    }

    public function render()
    {
        return view('livewire.add-invoice');
    }
}

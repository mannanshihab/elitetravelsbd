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
    public $customers_search;
    public $customers = '';

    public function mount()
    {
        $this->customers = Customer::get();
        $this->agents = Agent::get();
    }

    public function render()
    {
        if($this->customers_search){
            dd($this->customers_search);
            $this->customers = Customer::where('name', 'like', '%'.$this->customers_search.'%')->orWhere('mobile', 'like', '%'.$this->customers_search.'%')->get();
        }
        return view('livewire.add-invoice', ['customers' => $this->customers]);
    }
}

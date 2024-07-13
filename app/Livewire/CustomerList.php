<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;

class CustomerList extends Component
{
    public function render()
    {
        $customers = Customer::all();
        return view('livewire.customer-list', compact('customers'));
    }
}

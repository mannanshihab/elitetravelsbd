<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Component;
use Illuminate\Contracts\Session\Session;
use Livewire\Attributes\Title;

#[Title('Add Customer')]
class AddCustomer extends Component
{

    public $name = '';
    public $email = '';
    public $mobile = '';
    public $address = '';
    public $source = '';
    public $gender = '';


    public function addCustomer()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:customers',
            'mobile' => 'required',
            'address' => 'required',
            'source' => 'required',
            'gender' => 'required',
        ]);

        Customer::insert([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'source' => $this->source,
            'gender' => $this->gender
        ]);

        return back()->with('success', 'Customer added successfully');
    }
    
    public function render()
    {
        return view('livewire.add-customer');
    }
}

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
    public $dob = '';
    public $passport = '';
    public $member_id = '';
    public $email = '';
    public $mobile = '';
    public $address = '';
    public $source = '';
    public $gender = '';


    public function addCustomer()
    {

        $data = $this->validate([
            'name' => 'required',
            'dob' => 'required',
            'passport' => 'required',
            'member_id' => 'required',
            'email' => 'required|unique:customers',
            'mobile' => 'required',
            'address' => 'required',
            'source' => 'required',
            'gender' => 'required',
        ]);

        Customer::create($data);


        $this->dispatch('swal', [
            'title' => 'Customer added successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }

    public function render()
    {
        return view('livewire.add-customer');
    }
}

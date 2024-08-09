<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;
use Illuminate\Contracts\Session\Session;
use Livewire\Attributes\Title;

#[Title('Add Customer')]
class AddCustomer extends Component
{

    public $name = '';
    public $date_of_birth = '';
    public $passport_no = '';
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
            'date_of_birth' => 'required',
            'passport_no' => 'required',
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
        return view('livewire.customer.add-customer');
    }
}

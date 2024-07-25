<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Component;

class EditCustomer extends Component
{

    public $name = '';
    public $email = '';
    public $mobile = '';
    public $address = '';
    public $source = '';
    public $gender = '';



    public function mount($id)
    {
        $this->name = Customer::find($id)->name;
        $this->email = Customer::find($id)->email;
        $this->mobile = Customer::find($id)->mobile;
        $this->address = Customer::find($id)->address;
        $this->source = Customer::find($id)->source;
        $this->gender = Customer::find($id)->gender;
    }

    public function render()
    {
        return view('livewire.edit-customer');
    }
}

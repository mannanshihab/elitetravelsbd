<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Edit Customer')]
class EditCustomer extends Component
{
    public $id;
    public $name = '';
    public $email = '';
    public $mobile = '';
    public $address = '';
    public $source = '';
    public $gender = '';

    public function mount($id)
    {
        $this->id = $id;
        $this->name = Customer::find($id)->name;
        $this->email = Customer::find($id)->email;
        $this->mobile = Customer::find($id)->mobile;
        $this->address = Customer::find($id)->address;
        $this->source = Customer::find($id)->source;
        $this->gender = Customer::find($id)->gender;
    }


    public function updateCustomer()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'source' => 'required',
            'gender' => 'required',
        ]);

        $customer = Customer::find($this->id);
        $customer->update([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'source' => $this->source,
            'gender' => $this->gender,
        ]);

        
        $this->dispatch('swal', [
            'title' => 'Customer updated successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }

    

    public function render()
    {
        return view('livewire.edit-customer');
    }
}

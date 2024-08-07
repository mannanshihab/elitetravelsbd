<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Customer')]
class EditCustomer extends Component
{
    public $id;
    public $name;
    public $date_of_birth;
    public $passport_no;
    public $member_id;
    public $email;
    public $mobile;
    public $address;
    public $source;
    public $gender;

    public function mount($id)
    {
        $this->id = $id;
        $this->name = Customer::find($id)->name;
        $this->date_of_birth = Customer::find($id)->date_of_birth;
        $this->passport_no = Customer::find($id)->passport_no;
        $this->member_id = Customer::find($id)->member_id;
        $this->email = Customer::find($id)->email;
        $this->mobile = Customer::find($id)->mobile;
        $this->address = Customer::find($id)->address;
        $this->source = Customer::find($id)->source;
        $this->gender = Customer::find($id)->gender;
    }


    public function updateCustomer()
    {
        $data = $this->validate([
            'name' => 'required',
            'date_of_birth' => 'required',
            'passport_no' => 'required',
            'member_id' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'source' => 'required',
            'gender' => 'required',
        ]);

        $customer = Customer::find($this->id);
        $customer->update($data);

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

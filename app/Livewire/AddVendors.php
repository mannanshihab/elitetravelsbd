<?php

namespace App\Livewire;

use App\Models\Vendor;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Add Vendors')]
class AddVendors extends Component
{
    public $vendor_name = '';
    public $mobile = '';
    public $address = '';
    public $vendor_type = '';
    public $account_details = '';

    public function addVendors()
    {
        $this->validate([
            'vendor_name'   => 'required',
            'mobile'        => 'required',
            'address'       => 'required',
            'vendor_type'   => 'required',
            'account_details' => 'required',
        ]);

        Vendor::create([
            'vendor_name'   => $this->vendor_name,
            'mobile'        => $this->mobile,
            'address'       => $this->address,
            'vendor_type'   => $this->vendor_type,
            'account_details' => $this->account_details
        ]);

        $this->dispatch('swal', [
            'title' => 'Vendor added successfully.',
            'icon' => 'success',
        ]);
    }
    public function render()
    {
        return view('livewire.add-vendors');
    }
}

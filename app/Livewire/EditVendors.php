<?php

namespace App\Livewire;

use App\Models\Vendor;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Edit Vendors')]
class EditVendors extends Component
{
    public $id;
    public $vendor_name = '';
    public $mobile = '';
    public $address = '';
    public $vendor_type = '';
    public $account_details = '';

    public function mount($id)
    {
        $this->id = $id;
        $this->vendor_name  = Vendor::find($id)->vendor_name;
        $this->mobile       = Vendor::find($id)->mobile;
        $this->address      = Vendor::find($id)->address;
        $this->vendor_type  = Vendor::find($id)->vendor_type;
        $this->account_details = Vendor::find($id)->account_details;
    }

    public function updateVendors(){
        $this->validate([
            'vendor_name'   => 'required',
            'mobile'        => 'required',
            'address'       => 'required',
            'vendor_type'   => 'required',
            'account_details' => 'required',
       ]);

        $Vendor = Vendor::find($this->id);

        $Vendor->update([
            'vendor_name'   => $this->vendor_name,
            'mobile'        => $this->mobile,
            'address'       => $this->address,
            'vendor_type'   => $this->vendor_type,
            'account_details' => $this->account_details
        ]);
        
        $this->dispatch('swal', [
            'title' => 'Vendor updated successfully.',
            'icon' => 'success',
        ]);
    }

    public function render()
    {
        return view('livewire.edit-vendors');
    }
}

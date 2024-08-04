<?php

namespace App\Livewire;

use App\Models\Vendor;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Add Vendors')]
class AddVendors extends Component
{
    public $vendor_name;
    public $mobile;
    public $address;
    public $vendor_type;
    public $banks_details;

    public function addVendors()
    {
        $data = $this->validate([
            'vendor_name'   => 'required',
            'mobile'        => 'required',
            'address'       => 'required',
            'vendor_type'   => 'required',
            'banks_details' => 'required',
        ]);

        Vendor::create($data);

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

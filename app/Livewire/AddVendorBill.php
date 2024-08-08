<?php

namespace App\Livewire;

use App\Models\Vendor;
use App\Models\VendorStatement;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Add Vendors Bill')]
class AddVendorBill extends Component
{
    public $vendors;
    public $vendor_id;
    public $source;
    public $amount;
    public $pay_via;

    public function addAgentBill(){
        $data = $this->validate([
            'vendor_id'   => 'required',
            'source'     => 'required',
            'amount'     => 'required',
            'pay_via' => 'required',
        ]);

        VendorStatement::create($data);

        $this->dispatch('swal', [
            'title' => 'Vendor Bill added successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }
    public function render()
    {
        return view('livewire.add-vendor-bill');
    }

    public function mount()
    {

        $this->vendors = Vendor::get();
        
    }
}

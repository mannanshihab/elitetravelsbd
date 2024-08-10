<?php

namespace App\Livewire;

use App\Models\Invoice;
use Livewire\Component;

class InvoicePrint extends Component
{

    public $invoice;
    public function mount($invoice_id)
    {
        $this->invoice = Invoice::with('customer', 'billed')->where('invoice', $invoice_id)->first();
    }

    
    public function render()
    {
        return view('livewire.invoice-print')->layout();

    }
}

<?php

namespace App\Livewire\Invoice;

use App\Models\Invoice;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoicePreview extends Component
{
    public $invoice;

    public function mount($invoice_id)
    {
        $this->invoice = Invoice::with('customer', 'billed')->where('invoice', $invoice_id)->first();
    }

    public function print()
    {
        $this->dispatch('PrintThisInvoice'); 
    }

    public function pdf()
    {
        $this->dispatch('GetPDF'); 
    }

    public function render()
    {
        return view('livewire.invoice.invoice-preview');
    }
}

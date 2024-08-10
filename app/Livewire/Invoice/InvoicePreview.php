<?php

namespace App\Livewire\Invoice;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Invoice;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Invoice-Preview')]

class InvoicePreview extends Component
{
    public $invoice;

    public function mount($invoice_id)
    {
        $this->invoice = Invoice::with('customer', 'billed')->where('invoice', $invoice_id)->first();
    }
    
    public function pdf($invoice_id){

        $data=[
            'invoice' => $this->invoice = Invoice::with('customer', 'billed')->where('id', $invoice_id)->first()
        ];

        /* $pdf = Pdf::loadView('livewire.invoice.invoice-pdf', $data);
        return response()->streamDownload(function() use($pdf){
            echo $pdf->stream();
        }, $this->invoice->customer->name.'.pdf'); */

        $pdfContent = PDF::loadView('livewire.invoice.invoice-pdf', $data)->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            $this->invoice->invoice.".pdf"
        );

    }
    public function render()
    {
        return view('livewire.invoice.invoice-preview');
    }
}

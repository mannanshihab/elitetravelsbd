<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Invoice list')]
class InvoiceList extends Component
{
    public function render()
    {
        return view('livewire.invoice-list');
    }
}

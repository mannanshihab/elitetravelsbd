<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Create Invoice')]
class AddInvoice extends Component
{

    function CustomerData()
    {
        return 'test';
    }

    public function render()
    {
        return view('livewire.add-invoice');
    }
}

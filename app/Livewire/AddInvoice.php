<?php

namespace App\Livewire;

use Livewire\Component;

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

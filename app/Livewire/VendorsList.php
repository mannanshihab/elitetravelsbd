<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Vendors List')]
class VendorsList extends Component
{
    public function render()
    {
        return view('livewire.vendors-list');
    }
}

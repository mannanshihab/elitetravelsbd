<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Add Vendors')]
class AddVendors extends Component
{
    public function render()
    {
        return view('livewire.add-vendors');
    }
}

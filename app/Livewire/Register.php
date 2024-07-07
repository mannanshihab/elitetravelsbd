<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Register | Dashboard')]
class Register extends Component
{
    public function render()
    {
        return view('livewire.register');
    }
}

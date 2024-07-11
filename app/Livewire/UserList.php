<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Users')]
class UserList extends Component
{
    public function render()
    {
        return view('livewire.user-list');
    }
}

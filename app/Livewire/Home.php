<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Dashboard | Elite Travels')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.home');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}

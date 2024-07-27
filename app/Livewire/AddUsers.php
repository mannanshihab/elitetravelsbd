<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Add Users')]
class AddUsers extends Component
{   
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function addUser(){
       
        #validate   
        $this->validate([
            'name' => 'required',  
            'email'    => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|max:255|confirmed',
            'password_confirmation' => 'required|min:8|max:255'
        ]);

        $user = User::create([
            'name' => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password)           
        ]);

        $this->dispatch('swal', [
            'title' => 'User Created successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }

    public function render()
    {
        return view('livewire.add-users');
    }
}

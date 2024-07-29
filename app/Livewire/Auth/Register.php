<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Register | Elite Travels')]

class Register extends Component
{   
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function save(){
        // dd($this);


        #validate   
        $this->validate([
            'name' => 'required',  
            'email'    => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|max:255|confirmed',
            'password_confirmation' => 'required|min:6|max:255'
        ]);

        $user = User::create([
            'name' => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password)           
        ]);

        auth()->login($user);

        $this->redirect('/home');
    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}

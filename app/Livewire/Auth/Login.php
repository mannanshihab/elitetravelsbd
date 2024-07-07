<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{   
    public $email;
    public $password;

    public function save(){
         //dd($this->email, $this->password);
         
        $this->validate([
            'email'     => 'required',
            'password'  => 'required|min:8',
        ]);

        if(!auth()->attempt(['email' => $this->email, 'password' => $this->password])){
            Session()->flash('error', 'Invalidate Credentials');
            return;
        }

        return redirect()->intended();
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}

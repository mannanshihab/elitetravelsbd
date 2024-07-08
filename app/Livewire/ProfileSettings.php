<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Profile Settings')]
class ProfileSettings extends Component
{
    public $name;
    public $email;

    public function update()
    {
        $this->validate([
            'name'     => 'required',  
            'email'    => 'required|email|unique:users|max:255',
        ]);
        
        $user = User::find(auth()->user()->id)->update([
            'name' => $this->name,
            'email' => $this->email
        ]);
        $user->save();
        
        return redirect()->intended();
    }
    public function render()
    {    
        $user = User::find(auth()->user()->id);
        return view('livewire.profile-settings',[
            'user'=> $user
        ]);
    }
}

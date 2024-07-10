<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Session;
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
            'email' => 'required',  
        ]);
        
        $user = User::find(auth()->user()->id)->update([
            'name' => $this->name,
            'email' => $this->email
        ]);
        Session::flash('message', 'Update Succesfully');
        return redirect()->back();
    }
    public function delete($id)
    {
        $user = User::find(auth()->user()->id)->delete();
        return redirect()->route('/login');
    }
    public function render()
    {    
        return view('livewire.profile-settings');
    }
}

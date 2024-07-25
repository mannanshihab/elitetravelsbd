<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Session;
use Livewire\WithFileUploads;

#[Title('Profile Settings')]
class ProfileSettings extends Component
{

    use WithFileUploads;

    public $name;
    public $email;
    public $old_password;
    public $password;
    public $password_confirmation;
    public $photo;



    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function update()
    {
        $this->validate([
            'name'     => 'required',
            'email' => 'required',
        ]);


        if ($this->old_password && $this->password) {
            $password = $this->validate([
                'old_password' => 'required',
                'password' => 'required|confirmed|min:6',
            ]);

            if (!Hash::check($this->old_password, auth()->user()->password)) {
                return redirect()->back()->with('error', 'The old password is incorrect');
            }
        }

        $user = User::find(auth()->user()->id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $password['password'] ?? auth()->user()->password,
        ]);


        return redirect()->back()->with('success', 'Profile updated successfully');
    }


    function updatedPhoto()
    {

        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        $upload = $this->photo->store('uploads', 'real_public');
        $user = User::where('id', auth()->user()->id)->update([
            'photo' => $upload
        ]);

        return redirect()->back()->with('success', 'Photo updated successfully');
    }

    public function render()
    {
        return view('livewire.profile-settings');
    }
}

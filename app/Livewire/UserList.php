<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Users List')]
class UserList extends Component
{
    use WithPagination; 
    public $user_id;
    public $name;
    public $email;

    public function render()
    {
        $users = User::all();
        return view('livewire.user-list',[
           'users' =>$users
        ]);
    }

    public function delete($id)
    {
        User::find($id)->delete();
        Session::flash('success', 'User deleted successfully.');
        $this->reset('name','email');
    }

}

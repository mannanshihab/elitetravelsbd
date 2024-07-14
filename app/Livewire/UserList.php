<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Users')]
class UserList extends Component
{
    use WithPagination; 
    public $user_id;
    public $name;
    public $email;
    public $isOpen = 0;
 
    public function create()
    {
        $this->openModal();
    }
    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.user-list',[
           'users' =>$users
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt('password'),	
        ]);
        
        Session::flash('success', 'User created successfully.');
       
        $this->reset('name','email');
        $this->closeModal();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;

        $this->openModal();
    }
    public function update()
    {
        if ($this->user_id) {
            $user = User::findOrFail($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt('password'),
            ]);
            Session::flash('success', 'User updated successfully.');
            $this->closeModal();
            $this->reset('name', 'email', 'user_id');
        }
    }
    public function delete($id)
    {
        User::find($id)->delete();
        Session::flash('success', 'User deleted successfully.');
        $this->reset('name','email');
    }

}

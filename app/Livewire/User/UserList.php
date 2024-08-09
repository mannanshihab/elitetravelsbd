<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Users List')]
class UserList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $rows = 10;

    public $user_id;
    public $name;
    public $email;
    
    public function render()
    {
        if($this->search){
            $users = User::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'desc')->paginate($this->rows);
            
        }else{
            $users = User::orderBy('id', 'desc')->paginate($this->rows);
        }
        return view('livewire.user.user-list', ['users' =>$users]);
        
    }

    public function delete($id)
    {
        User::find($id)->delete();
        $this->dispatch('swal', [
            'title' => 'User Deleted Successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }

}

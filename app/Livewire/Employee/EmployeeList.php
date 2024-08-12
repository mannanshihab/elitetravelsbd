<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
#[Title('Employees List')]

class EmployeeList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $rows = 10;

    // public function addUser($id){

    //     $employee = Employee::select('name', 'email')->find($id);

    //     $user = User::firstOrCreate(
    //         ['email' => $employee->email],
    //         ['name' => $employee->name, 'password' => Hash::make('password')]
    //     );
       
    //     $this->redirect('/list-users', navigate: true);
    // }

    public function render()
    {   
        if($this->search){
            $employees = Employee::whereNull('deleted_at')->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('mobile', 'like', '%'.$this->search.'%')
            ->orWhere('address', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'desc')->paginate($this->rows);
            
        }else{
            $employees = Employee::whereNull('deleted_at')->orderBy('id', 'desc')->paginate($this->rows);
        }
        return view('livewire.employee.employee-list', ['employees' =>  $employees]);
    }

    public function delete($id)
    {
        $Employee=Employee::find($id);
        $Employee->deleted_at = now();
        $Employee->deleted_by = Auth::user()->id;
        $Employee->save();
        $this->dispatch('swal', [
            'title' => 'Employee Deleted Successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }

}

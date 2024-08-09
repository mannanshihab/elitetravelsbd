<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
#[Title('Edit Employee')]
class EditEmployee extends Component
{
    use WithFileUploads;
    public $employee_id;
    
    public $name = '';
    public $email = '';
    public $designation = '';
    public $salary = '';
    public $ta_da = '';
    public $mobile = '';
    public $address = '';
    public $nid_no;
    public $employee_cv ;
    public $bkash = '';
    public $banks_details = '';

    public function mount($id)
    {
        $employee = Employee::find($id);
        $this->employee_id = $id;
        $this->name = $employee->name;
        $this->email = $employee->email;
        $this->designation = $employee->designation;
        $this->salary = $employee->salary;
        $this->ta_da = $employee->ta_da;
        $this->mobile = $employee->mobile;
        $this->address = $employee->address;
        $this->bkash = $employee->bkash;
        $this->banks_details = $employee->banks_details;
    }

    public function editEmployee(){

        $this->validate([
            'name'          => 'required',
            'email'         => 'required',
            'designation'   => 'required',
            'salary'       => 'required',
            'ta_da'         => 'required',
            'mobile'        => 'required',
            'address'       => 'required',
            'nid_no'        => 'nullable|mimes:jpeg,jpg,png,gif',
            'employee_cv'   => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'bkash'         => 'required',
            // 'banks_details' => 'required',
        ]);

        $employee  = Employee::find($this->employee_id);
        $employee->name = $this->name;
        $employee->email = $this->email;
        $employee->designation = $this->designation;
        $employee->salary = $this->salary;
        $employee->ta_da = $this->ta_da;
        $employee->mobile = $this->mobile;
        $employee->address = $this->address;
        $employee->bkash = $this->bkash;
        $employee->banks_details = $this->banks_details;
        
        if (!empty($this->nid_no)) {
            $nid_no = $this->nid_no->store('uploads/Employees/NID', 'real_public');
            $employee->nid_no = @$nid_no;
        }
        if (!empty($this->employee_cv)) {
            $employee_cv = $this->employee_cv->store('uploads/Employees/CV', 'real_public');
            $employee->employee_cv = @$employee_cv;
        }
        $employee->save();

        $this->dispatch('swal', [
            'title' => 'Employee updated successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);

    }
    public function render()
    {
        return view('livewire.employee.edit-employee');
    }
}

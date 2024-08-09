<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Add Employee')]
class AddEmployee extends Component
{
    use WithFileUploads;

    public $name = '';
    public $email = '';
    public $designation = '';
    public $salary = '';
    public $ta_da = '';
    public $mobile = '';
    public $address = '';
    public $nid_no;
    public $employee_cv;
    public $bkash = '';
    public $banks_details = '';


    public function addEmployee()
    {

        $this->validate([
            'name'          => 'required',
            'email'         => 'required|unique:employees',
            'designation'   => 'required',
            'salary'       => 'required',
            'ta_da'         => 'required',
            'mobile'        => 'required',
            'address'       => 'required',
            'nid_no'        => 'nullable|mimes:jpeg,jpg,png,gif',
            'employee_cv'   => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'bkash'         => 'required',
            'banks_details' => 'required',
        ]);

        if ($this->nid_no) {
            $nidPath = $this->nid_no->store('uploads/Employees/NID', 'real_public');
        }

        if ($this->employee_cv) {
            $ecvPath = $this->employee_cv->store('uploads/Employees/CV', 'real_public');
        }

        Employee::create([
            'name'          => $this->name,
            'email'         => $this->email,
            'designation'   => $this->designation,
            'salary'       => $this->salary,
            'ta_da'         => $this->ta_da,
            'mobile'        => $this->mobile,
            'address'       => $this->address,
            'nid_no'        => @$nidPath,
            'employee_cv'   => @$ecvPath,
            'bkash'         => $this->bkash,
            'banks_details' => $this->banks_details,
        ]);

        //dd($employee);

        $this->dispatch('swal', [
            'title' => 'Employee added successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }
    public function render()
    {
        return view('livewire.employee.add-employee');
    }
}

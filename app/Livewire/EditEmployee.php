<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditEmployee extends Component
{
    use WithFileUploads;
    public $employee_id;
    
    public $name = '';
    public $email = '';
    public $designation = '';
    public $sallery = '';
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
        $this->sallery = $employee->sallery;
        $this->ta_da = $employee->ta_da;
        $this->mobile = $employee->mobile;
        $this->address = $employee->address;
        $this->banks_details = $employee->banks_details;
    }

    public function editEmployee(){

        $this->validate([
            'name'         => 'required',
            'designation'  => 'required',
            'email'        => 'required',
            'mobile'       => 'required',
            'address'      => 'required',
        ]);

        $employee  = Employee::find($this->employee_id);
        $employee->name = $this->name;
        $employee->email = $this->email;
        $employee->designation = $this->designation;
        $employee->sallery = $this->sallery;
        $employee->ta_da = $this->ta_da;
        $employee->mobile = $this->mobile;
        $employee->address = $this->address;
        $employee->banks_details = $this->banks_details;
        
        if (!empty($this->nid_no)) {
            $nid_no = $this->nid_no->store('uploads', 'real_public');
            $employee->nid_no = @$nid_no;
        }
        if (!empty($this->employee_cv)) {
            $employee_cv = $this->employee_cv->store('uploads', 'real_public');
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
        return view('livewire.edit-employee');
    }
}
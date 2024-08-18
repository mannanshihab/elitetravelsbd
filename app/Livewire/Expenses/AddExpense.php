<?php

namespace App\Livewire\Expenses;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Expense;
use Livewire\Attributes\Title;

#[Title('Add Expense')]
class AddExpense extends Component
{

    public $type_of_expense;
    public $employee_id;
    public $purpose;
    public $employees;
    public $amount;

    public function addExpenseBill()
    {
        $data = $this->validate([
            'type_of_expense' => 'required',
            'amount' => 'required',
        ]);

        $data['purpose'] = $this->purpose;
        $data['employee_id'] = $this->employee_id;


        Expense::create($data);
        $this->dispatch('swal', [
            'title' => 'Expense added successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }



    public function render()
    {
        if ($this->type_of_expense == 'Salary') {
            $this->dispatch('picker', [
                'status' => 'yes',
            ]);
        }

        $this->dispatch('picker', [
            'status' => 'yes',
        ]);

        return view('livewire.expenses.add-expense');
    }

    public function mount()
    {
        $this->employees = Employee::whereNull('deleted_at')->get();
    }
}

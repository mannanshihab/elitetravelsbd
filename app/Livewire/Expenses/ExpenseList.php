<?php

namespace App\Livewire\Expenses;

use App\Models\Expense;
use Livewire\Component;
use Livewire\WithPagination;

class ExpenseList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $rows = 10;
    public $datefilter;

    public function render()
    {
        if ($this->datefilter && $this->search) {
            $explode = explode(' - ', $this->datefilter);
            $start = date('Y-m-d', strtotime($explode[0])) . ' 00:00:00';
            $end = date('Y-m-d', strtotime($explode[1])) . ' 23:59:59';

            $expenses = Expense::with('employee')->whereHas('employee', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
                $query->orWhere('mobile', 'like', '%' . $this->search . '%');
            })
                ->whereNull('deleted_at')
                ->orWhere('amount', 'like', '%' . $this->search . '%')
                ->whereBetween('created_at', [$start, $end])->orderBy('id', 'desc')->paginate($this->rows);
        } elseif ($this->datefilter) {
            $explode = explode(' - ', $this->datefilter);
            $start = date('Y-m-d', strtotime($explode[0])) . ' 00:00:00';
            $end = date('Y-m-d', strtotime($explode[1])) . ' 23:59:59';

            $expenses = Expense::with('employee')->whereNull('deleted_at')
                ->whereBetween('created_at', [$start, $end])->orderBy('id', 'desc')->paginate($this->rows);
        } elseif ($this->search) {
            $expenses = Expense::with('employee')
                ->whereHas('employee', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('mobile', 'like', '%' . $this->search . '%');
                })
                ->where(function ($query) {
                    $query->whereNull('deleted_at')
                        ->orWhere('amount', 'like', '%' . $this->search . '%');
                })
                ->paginate($this->rows);
        } else {
            $expenses = Expense::with('employee')->whereNull('deleted_at')->orderBy('id', 'desc')->paginate($this->rows);
        }

        return view('livewire.expenses.expense-list', ['expenses' => $expenses]);
    }

    public function delete($id)
    {
        $Agent = Expense::find($id);
        $Agent->deleted_at = now();
        $Agent->deleted_by = auth()->user()->id;
        $Agent->save();

        $this->dispatch('swal', [
            'title' => 'Expense Deleted Successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }
}

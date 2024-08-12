<?php

namespace App\Livewire;

use App\Models\Agent;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Invoice;
use App\Models\Vendor;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Dashboard | Elite Travels')]
class Home extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $rows = 3;

    public function render()
    {
        $agentCount     = Agent::count();
        $customerCount  = Customer::whereNull('deleted_at')->count();
        $employeesCount = Employee::count();
        $vendorsCount   = Vendor::count();

        $total_invoices = Invoice::count();
        //$total_invoices_processing = Invoice::where('status', 'processing')->count();

        $invoices_processing = Invoice::with('customer', 'billed')->orderBy('id', 'desc')->where('status', 'processing')->paginate($this->rows);
        $invoices_success = Invoice::with('customer', 'billed')->orderBy('id', 'desc')->where('status', 'success')->paginate($this->rows);
        $invoices_refused = Invoice::with('customer', 'billed')->orderBy('id', 'desc')->where('status', 'refused')->paginate($this->rows);
        $invoices_delivered = Invoice::with('customer', 'billed')->orderBy('id', 'desc')->where('status', 'delivered')->paginate($this->rows);
        //dd($invoices);
        return view('livewire.home', [
            'agentCount'        => $agentCount,
            'customerCount'     => $customerCount,
            'employeesCount'    => $employeesCount,
            'vendorsCount'      => $vendorsCount,
            'total_invoices'    => $total_invoices,
            'invoices_processing'  => $invoices_processing,
            'invoices_success'     => $invoices_success,
            'invoices_refused'     => $invoices_refused,
            'invoices_delivered'   => $invoices_delivered,
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}

<?php

namespace App\Livewire\Invoice;

use App\Models\AgentStatement;
use App\Models\Invoice;
use App\Models\Vendor;
use App\Models\VendorStatement;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
#[Title('Invoice list')]
class InvoiceList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $rows = 10;
    public $total_clients;
    public $total_invoices;
    public $amount;
    public $received_amount;

    public function render()
    {
        if($this->search){
            $invoices = Invoice::with('customer', 'billed')->where('invoice', 'like', '%'.$this->search.'%')
            ->orWhere('passport_no', 'like', '%'.$this->search.'%')
            ->orWhere('web_file_no', 'like', '%'.$this->search.'%')
            ->orWhere('token_no', 'like', '%'.$this->search.'%')
            ->orWhere('member_id', 'like', '%'.$this->search.'%')
            ->orWhere('work_type', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'desc')->paginate($this->rows);
            
        }else{
            $invoices = Invoice::with('customer', 'billed')->orderBy('id', 'desc')->paginate($this->rows);
        }

        return view('livewire.invoice.invoice-list', ['invoices' => $invoices]);
    }

    public function mount()
    {
        $this->total_clients = Invoice::distinct()->count('customer_id');
        $this->total_invoices = Invoice::count();
        $this->amount = Invoice::sum('our_amount');
        $this->received_amount = Invoice::sum('received_amount');
    }

    public function delete($id)
    {
        $getInvoiceNo = Invoice::find($id)->invoice;
        AgentStatement::where('source', $getInvoiceNo)->delete();
        VendorStatement::where('source', $getInvoiceNo)->delete();
        $Invoice = Invoice::find($id);
        $Invoice->deleted_at = now();
        $Invoice->deleted_by = Auth::user()->id;
        $Invoice->save();

        $this->dispatch('swal', [
            'title' => 'Invoice Deleted Successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Invoice;
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

        $total_clients = Invoice::distinct()->count('customer_id');
        $total_invoices = Invoice::count();

        return view('livewire.invoice-list', ['invoices' => $invoices, 'total_clients' => $total_clients, 'total_invoices' => $total_invoices]);
    }

    public function delete($id)
    {
        Invoice::find($id)->delete();

        $this->dispatch('swal', [
            'title' => 'Invoice Deleted Successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }
}

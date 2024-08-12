<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
#[Title('Customer List')]
class CustomerList extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $rows = 10;


    public function delete($id)
    {
        $Customer = Customer::find($id);
        $Customer->deleted_at = now();
        $Customer->deleted_by = Auth::user()->id;
        $Customer->save();

        $this->dispatch('swal', [
            'title' => 'Customer Deleted Successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }

    public function render()
    {
        if($this->search){
            $customers = Customer::whereNull('deleted_at')->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('mobile', 'like', '%'.$this->search.'%')
            ->orWhere('address', 'like', '%'.$this->search.'%')
            ->orWhere('source', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'desc')->paginate($this->rows);
            
        }else{
            $customers = Customer::whereNull('deleted_at')->orderBy('id', 'desc')->paginate($this->rows);
        }
        return view('livewire.customer.customer-list', ['customers' => $customers]);
    }
}

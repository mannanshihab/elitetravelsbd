<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
#[Title('Customer List')]
class CustomerList extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $rows = 10;

    public function render()
    {
        if($this->search){
            $customers = Customer::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('mobile', 'like', '%'.$this->search.'%')
            ->orWhere('address', 'like', '%'.$this->search.'%')
            ->orWhere('source', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'desc')->paginate($this->rows);
            
        }else{
            $customers = Customer::orderBy('id', 'desc')->paginate($this->rows);
        }
        return view('livewire.customer-list', ['customers' => $customers]);
    }
}

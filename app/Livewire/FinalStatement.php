<?php

namespace App\Livewire;

use App\Models\Expense;
use App\Models\Invoice;
use Livewire\Component;
use App\Models\AgentStatement;
use Livewire\Attributes\Title;
use App\Models\VendorStatement;
#[Title('Final Statement')]
class FinalStatement extends Component
{

    public $invoice;
    public $expense;
    public $agent;
    public $vendor;
    public $datefilter;


    

    public function render()
    {
        if($this->datefilter){
            $explode = explode(' - ', $this->datefilter);
            $start = date('Y-m-d', strtotime($explode[0])) . ' 00:00:00';
            $end = date('Y-m-d', strtotime($explode[1])) . ' 23:59:59';

            $this->invoice = Invoice::where('status', 'delivered')->whereBetween('created_at', [$start, $end])->sum('received_amount');
            $this->expense = Expense::whereBetween('created_at', [$start, $end])->sum('amount');
            $this->agent = AgentStatement::whereBetween('created_at', [$start, $end])->sum('amount');
            $this->vendor = VendorStatement::whereBetween('created_at', [$start, $end])->sum('amount');
        }
        return view('livewire.final-statement');
    }

    public function mount()
    {
        $this->invoice = Invoice::where('status', 'delivered')->sum('received_amount');
        $this->expense = Expense::query()->sum('amount');
        $this->agent = AgentStatement::query()->sum('amount');
        $this->vendor = VendorStatement::query()->sum('amount');
    }
}

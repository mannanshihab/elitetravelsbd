<?php

namespace App\Livewire;

use App\Models\Expense;
use App\Models\Invoice;
use Livewire\Component;
use App\Models\AgentStatement;
use App\Models\VendorStatement;

class FinalStatement extends Component
{

    public $invoice;
    public $expense;
    public $agent;
    public $vendor;


    public function render()
    {
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

<?php

namespace App\Livewire;

use App\Models\Agent;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Vendor;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Dashboard | Elite Travels')]
class Home extends Component
{
    public function render()
    {
        $agentCount     = Agent::count();
        $customerCount  = Customer::count();
        $employeesCount = Employee::count();
        $vendorsCount   = Vendor::count();

        return view('livewire.home', [
            'agentCount'        => $agentCount,
            'customerCount'     => $customerCount,
            'employeesCount'    => $employeesCount,
            'vendorsCount'      => $vendorsCount,
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}

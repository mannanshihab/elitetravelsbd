<?php

namespace App\Livewire;

use App\Models\Agent;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Invoice;
use Livewire\Attributes\Title;

#[Title('Add Invoice')]
class AddInvoice extends Component
{

    public $agents;
    public $customers;
    public $mandatory;







    public $customer_id;
    public $agent_id;
    public $date_of_birth;
    public $passport_no;
    public $web_fIle_no;
    public $token_no;
    public $member_id;
    public $work_type;
    public $rcv_date;
    public $delivery_date;
    public $status;
    public $amount;
    public $qty;
    public $total_amount;
    public $costing;
    public $visa_fee;
    public $service_charge;



    public function getCustomer()
    {
        dd($this);
    }



    public function addInvoice()
    {
        $data = $this->validate([
            'customer_id' => 'required',
            'agent_id' => 'required',
            'date_of_birth' => 'required',
            'passport_no' => 'required',
            'web_fIle_no' => 'required',
            'token_no' => 'required',
            'member_id' => 'required',
            'work_type' => 'required',
            'rcv_date' => 'required',
            'delivery_date' => 'required',
            'status' => 'required',
            'amount' => 'required',
            'qty' => 'required',
            'total_amount' => 'required',
            'costing' => 'required',
            'visa_fee' => 'required',
            'service_charge' => 'required',
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['invoice'] = rand(100000, 999999);
        Invoice::create($data);


        $this->dispatch('swal', [
            'title' => 'Invoice added successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }




    public function render()
    {
        if ($this->customer_id && $this->work_type) {
            $customer = Customer::find($this->customer_id);
            $this->date_of_birth = $customer->date_of_birth;
            $this->passport_no = $customer->passport;
            $this->member_id = $customer->member_id;
            $this->mandatory = true;
        }

        return view('livewire.add-invoice');
    }

    public function mount()
    {
        $this->customers = Customer::get();
        $this->agents = Agent::get();
    }
}

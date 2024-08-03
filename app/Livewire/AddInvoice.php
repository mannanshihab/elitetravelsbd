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
    public $html;



    public $work_type;
    public $customer_id;
    public $date_of_birth;
    public $package_name;
    public $passport_no;
    public $web_file_no;
    public $token_no;
    public $ticket_no;
    public $pnr_no;
    public $member_id;
    public $appointment_date;
    public $rcv_date;
    public $delivery_date;
    public $status;
    public $agent_id;
    public $main_amount;
    public $qty;
    public $total_amount;
    public $costing;
    public $visa_fee;
    public $service_charge;



    public function addInvoice()
    {
        if ($this->work_type == 'visa') {
            $data = $this->validate([
                'work_type' => 'required',
                'customer_id' => 'required',
                'date_of_birth' => 'required',
                'passport_no' => 'required',
                'member_id' => 'required',
                'appointment_date' => 'required',
                'web_file_no' => 'required',
                'token_no' => 'required',
                'rcv_date' => 'required',
                'delivery_date' => 'required',
                'status' => 'required',
                'main_amount' => 'required',
                'recive_amount' => 'required',
            ]);
           
        }elseif($this->work_type == 'air ticket'){
            $data = $this->validate([
                'work_type' => 'required',
                'customer_id' => 'required',
                'date_of_birth' => 'required',
                'passport_no' => 'required',
                'member_id' => 'required',
                'ticket_no' => 'required',
                'pnr_no' => 'required',
                'main_amount' => 'required',
                'recive_amount' => 'required',
            ]);
        }elseif($this->work_type == 'tour package'){
            $data = $this->validate([
                'work_type' => 'required',
                'customer_id' => 'required',
                'date_of_birth' => 'required',
                'passport_no' => 'required',
                'member_id' => 'required',
                'package_name' => 'required',
                'main_amount' => 'required',
                'recive_amount' => 'required',
            ]);
        }

        if($this->costing > 0){
            $data['costing'] = $this->costing;
        }
        $data['user_id'] = auth()->user()->id;
        $data['invoice'] = rand(100000, 999999);
        Invoice::create($data);

        $this->dispatch('swal', [
            'title' => 'Invoice added successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }


    public function getCustomerDetails()
    {
        if (empty($this->customer_id)) {
            $this->date_of_birth = '';
            $this->passport_no = '';
            $this->member_id = '';
        } else {
            $customer = Customer::find($this->customer_id);
            $this->date_of_birth = $customer->date_of_birth;
            $this->passport_no = $customer->passport;
            $this->member_id = $customer->member_id;
        }
    }


    public function render()
    {
        $customers = Customer::get();
        if ($this->work_type == 'visa') {
            $this->html = view('livewire.invoice-of-visa', ['customers' => $customers])->render();
            $this->dispatch('picker', [
                'status' => 'yes',
            ]);
        } elseif ($this->work_type == 'air ticket') {
            $this->html = view('livewire.invoice-of-air-ticket', ['customers' => $customers])->render();
            $this->dispatch('picker', [
                'status' => 'no',
            ]);
        } elseif ($this->work_type == 'tour package') {
            $this->html = view('livewire.invoice-of-tour', ['customers' => $customers])->render();
            $this->dispatch('picker', [
                'status' => 'yes',
            ]);
        }

        return view('livewire.add-invoice');
    }

    public function mount()
    {
        $this->customers = Customer::get();
        $this->agents = Agent::get();
    }
}

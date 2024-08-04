<?php

namespace App\Livewire;

use App\Models\Agent;
use App\Models\Vendor;
use App\Models\Invoice;
use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\Title;

#[Title('Add Invoice')]
class AddInvoice extends Component
{

    // just for viewing purpose
    public $agents; 
    public $customers;
    public $vendors;
    public $html;
    public $profit;  


    // working purpose
    public $work_type;
    public $customer_id;
    public $agent_id;
    public $vendor_id;
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
    public $our_amount;
    public $received_amount;
    public $costing;
    public $agent_amount;


    public function addInvoice()
    {

        if ($this->work_type == 'visa') {
            $data = $this->validate([
                'work_type' => 'required',
                'customer_id' => 'required',
                'passport_no' => 'required',
                'member_id' => 'required',
                'appointment_date' => 'required',
                'web_file_no' => 'required',
                'token_no' => 'required',
                'rcv_date' => 'required',
                'delivery_date' => 'required',
                'status' => 'required',
                'agent_id' => 'required',
                'our_amount' => 'required',
                'received_amount' => 'required',
                'agent_amount' => 'required',
            ]);
        } elseif ($this->work_type == 'air ticket') {
            $data = $this->validate([
                'work_type' => 'required',
                'customer_id' => 'required',
                'date_of_birth' => 'required',
                'passport_no' => 'required',
                'member_id' => 'required',
                'ticket_no' => 'required',
                'pnr_no' => 'required',
                'our_amount' => 'required',
                'received_amount' => 'required',
                'agent_amount' => 'required',
            ]);
        } elseif ($this->work_type == 'tour package') {
            $data = $this->validate([
                'work_type' => 'required',
                'customer_id' => 'required',
                'date_of_birth' => 'required',
                'passport_no' => 'required',
                'member_id' => 'required',
                'package_name' => 'required',
                'our_amount' => 'required',
                'received_amount' => 'required',
                'agent_amount' => 'required',
            ]);
        }

        unset($data['date_of_birth']);
        unset($data['passport_no']);
        unset($data['member_id']);

        if($this->vendor_id && $this->costing){
            $data['vendor_id'] = $this->vendor_id;
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


        if ($this->our_amount && $this->received_amount) {
            if($this->our_amount == $this->received_amount){
                $this->agent_amount = 0;
            }elseif ($this->our_amount < $this->received_amount) {
                $this->agent_amount = str_replace('-', '', $this->our_amount - $this->received_amount);
            }elseif($this->our_amount > $this->received_amount){
                $this->agent_amount = $this->received_amount - $this->our_amount;
            }
        }


        if ($this->status == 'delivered' && $this->our_amount && $this->received_amount && $this->costing) {
            $this->profit = $this->our_amount - $this->costing;
        }



        return view('livewire.add-invoice');
    }

    public function mount()
    {
        $this->vendors = Vendor::get();
        $this->customers = Customer::get();
        $this->agents = Agent::get();
    }
}

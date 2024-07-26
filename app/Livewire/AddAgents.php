<?php

namespace App\Livewire;

use App\Models\Agent;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Add Agents')]
class AddAgents extends Component
{
    use WithFileUploads; 
    public $company_name = '';
    public $ceo_name = '';
    public $email = '';
    public $mobile = '';
    public $address = '';  
    public $trade_license_no;
    public $nid_no;  
    public $banks_details = '';  
    public $bankNames = '';

    public function addBankNameField()
    {
        $this->bankNames .= '<div class="input-group">';
        $this->bankNames .= ' <span class="input-group-text">Banks</span>';
        $this->bankNames .= ' <textarea class="form-control" rows="6" aria-label="With textarea"></textarea>';
        $this->bankNames .= '</div>';
    }

    public function addAgent(){
        $this->validate([
            'company_name' => 'required',
            'ceo_name'     => 'required',
            'email'        => 'required|unique:customers',
            'mobile'       => 'required',
            'address'      => 'required',
            'trade_license_no' => 'required|file',
            'nid_no' => 'required|file', 
        ]);

        $tradeLicensePath = $this->trade_license_no->store('agents/trade_license', 'real_public');
        $nidPath = $this->nid_no->store('agents/nid', 'real_public');

        Agent::insert([
            'company_name'      => $this->company_name,
            'ceo_name'          => $this->ceo_name,
            'email'             => $this->email,
            'mobile'            => $this->mobile,
            'address'           => $this->address,
            'trade_license_no'  => $tradeLicensePath,
            'nid_no'            => $nidPath,
            'banks_details'     => $this->banks_details
        ]);

        return back()->with('success', 'Agent added successfully');
    }

    public function render()
    {
        return view('livewire.add-agents');
    }
}

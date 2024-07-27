<?php

namespace App\Livewire;

use App\Models\Agent;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditAgents extends Component
{

    use WithFileUploads;
    public $agent_id;
    public $company_name = '';
    public $ceo_name = '';
    public $email = '';
    public $mobile = '';
    public $address = '';
    public $banks_details = '';
    public $trade_license_no;
    public $nid_no;

    public function mount($id)
    {
        $agent = Agent::find($id);
        $this->agent_id = $id;
        $this->company_name = $agent->company_name;
        $this->ceo_name = $agent->ceo_name;
        $this->email = $agent->email;
        $this->mobile = $agent->mobile;
        $this->address = $agent->address;
        $this->banks_details = $agent->banks_details;
    }

    public function updateAgent(Request $request)
    {
        $this->validate([
            'company_name' => 'required',
            'ceo_name'     => 'required',
            'email'        => 'required',
            'mobile'       => 'required',
            'address'      => 'required',
        ]);

        
        $agent = Agent::find($this->agent_id);
        $agent->company_name = $this->company_name;
        $agent->ceo_name = $this->ceo_name;
        $agent->email = $this->email;
        $agent->mobile = $this->mobile;
        $agent->address = $this->address;
        $agent->banks_details = $this->banks_details;
        if (!empty($this->trade_license_no)) {
            $trade_license_no = $this->trade_license_no->store('uploads', 'real_public');
            $agent->trade_license_no = $trade_license_no;
        }

        if (!empty($this->nid_no)) {
            $nid_no = $this->nid_no->store('uploads', 'real_public');
            $agent->nid_no = @$nid_no;
        }
        $agent->save();


        $this->dispatch('swal', [
            'title' => 'Agent updated successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }


    public function render()
    {
        return view('livewire.edit-agents');
    }
}

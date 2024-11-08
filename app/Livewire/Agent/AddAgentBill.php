<?php

namespace App\Livewire\Agent;

use App\Models\Agent;
use App\Models\AgentStatement;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Add Agents Bill')]
class AddAgentBill extends Component
{
    public $agents;
    public $agent_id;
    public $pay_or_receive;
    public $source;
    public $amount;
    public $pay_via;

    public function addAgentBill()
    {
        $data = $this->validate([
            'agent_id'   => 'required',
            'pay_or_receive' => 'required',
            'source'     => 'required',
            'amount'     => 'required',
            'pay_via' => 'required',
        ]);
        
        if($this->pay_or_receive == 'pay'){
            $data['amount'] = '-'.$data['amount'];
        }

        AgentStatement::create($data);

        $this->dispatch('swal', [
            'title' => 'Agent Bill added successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }

    public function render()
    {

        return view('livewire.agent.add-agent-bill');
    }

    public function mount()
    {
        $this->agents = Agent::whereNull('deleted_at')->get();
    }
}

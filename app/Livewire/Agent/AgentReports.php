<?php

namespace App\Livewire\Agent;

use App\Models\Agent;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AgentStatement;
use Livewire\Attributes\Title;

#[Title('Agents Reports')]
class AgentReports extends Component
{


    // just for viewing purpose
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $rows = 10;
    public $agents;

    // working purpose
    public $datefilter;
    public $agent_id;

    public function render()
    {

        if ($this->datefilter && $this->agent_id && $this->search) {
            $explode = explode(' - ', $this->datefilter);
            $start = date('Y-m-d', strtotime($explode[0])) . ' 00:00:00';
            $end = date('Y-m-d', strtotime($explode[1])) . ' 23:59:59';
            $statements = AgentStatement::with('agent')->whereHas('agent', function ($query) {
                $query->where('id', $this->agent_id);
            })
                ->where('source', 'like', '%' . $this->search . '%')
                ->orWhere('amount', 'like', '%' . $this->search . '%')
                ->orWhere('pay_via', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->whereBetween('created_at', [$start, $end])->orderBy('id', 'desc')->paginate($this->rows);
        } elseif ($this->datefilter && $this->agent_id) {
            $explode = explode(' - ', $this->datefilter);
            $start = date('Y-m-d', strtotime($explode[0])) . ' 00:00:00';
            $end = date('Y-m-d', strtotime($explode[1])) . ' 23:59:59';
            $statements = AgentStatement::with('agent')->whereHas('agent', function ($query) {
                $query->where('id', $this->agent_id);
            })->whereBetween('created_at', [$start, $end])->orderBy('id', 'desc')->paginate($this->rows);
        } elseif ($this->agent_id && $this->search) {
            $statements = AgentStatement::with('agent')->whereHas('agent', function ($query) {
                $query->where('id', $this->agent_id);
            })->where('source', 'like', '%' . $this->search . '%')
                ->orWhere('amount', 'like', '%' . $this->search . '%')
                ->orWhere('pay_via', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')->paginate($this->rows);
        } elseif ($this->datefilter) {
            $explode = explode(' - ', $this->datefilter);
            $start = date('Y-m-d', strtotime($explode[0])) . ' 00:00:00';
            $end = date('Y-m-d', strtotime($explode[1])) . ' 23:59:59';
            $statements = AgentStatement::with('agent')->whereBetween('created_at', [$start, $end])->orderBy('id', 'desc')->paginate($this->rows);
        } elseif ($this->agent_id) {
            $statements = AgentStatement::with('agent')->whereHas('agent', function ($query) {
                $query->where('id', $this->agent_id);
            })->orderBy('id', 'desc')->paginate($this->rows);
        } elseif ($this->search) {
            $statements = AgentStatement::with('agent')->where('source', 'like', '%' . $this->search . '%')->orWhere('amount', 'like', '%' . $this->search . '%')->orWhere('pay_via', 'like', '%' . $this->search . '%')->orWhere('created_at', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate($this->rows);
        } else {
            $statements = AgentStatement::with('agent')->orderBy('id', 'desc')->paginate($this->rows);
        }

        return view('livewire.agent.agent-reports', ['statements' => $statements]);
    }

    public function mount()
    {
        $this->agents = Agent::get();
    }



    public function delete($id)
    {
        AgentStatement::find($id)->delete();

        $this->dispatch('swal', [
            'title' => 'Agent Statement Deleted Successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }
}

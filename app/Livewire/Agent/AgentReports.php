<?php

namespace App\Livewire\Agent;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AgentStatement;
use Livewire\Attributes\Title;

#[Title('Agents Reports')]
class AgentReports extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $rows = 10;


    public function render()
    {
        if ($this->search) {
            $statements = AgentStatement::with('agent')->where('source', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate($this->rows);
        } else {
            $statements = AgentStatement::with('agent')->orderBy('id', 'desc')->paginate($this->rows);
        }

        return view('livewire.agent.agent-reports', ['statements' => $statements]);
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

<?php

namespace App\Livewire;

use App\Models\Agent;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Agents List')]
class AgentsList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $rows = 10;
    public function render()
    {   
        if($this->search){
            $agents = Agent::where('ceo_name', 'like', '%'.$this->search.'%')
            ->orWhere('company_name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('mobile', 'like', '%'.$this->search.'%')
            ->orWhere('address', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'desc')->paginate($this->rows);
            
        }else{
            $agents = Agent::orderBy('id', 'desc')->paginate($this->rows);
        }
        return view('livewire.agents-list', ['agents' => $agents]);
    }

    public function delete($id)
    {
        Agent::find($id)->delete();

        $this->dispatch('swal', [
            'title' => 'Customer Deleted Successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }
}

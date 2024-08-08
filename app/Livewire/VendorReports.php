<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\VendorStatement;
use Livewire\Attributes\Title;

#[Title('Vendor Reports')]
class VendorReports extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $rows = 10;

    public function render()
    {
        if ($this->search) {
            $statements = VendorStatement::with('vendor')->where('source', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate($this->rows);
        } else {
            $statements = VendorStatement::with('vendor')->orderBy('id', 'desc')->paginate($this->rows);
        }

        return view('livewire.vendor-reports', ['statements' => $statements]);
    }

    public function delete($id)
    {
        VendorStatement::find($id)->delete();

        $this->dispatch('swal', [
            'title' => 'Vendor Statement Deleted Successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }
}

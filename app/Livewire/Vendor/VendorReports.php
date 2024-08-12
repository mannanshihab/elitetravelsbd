<?php

namespace App\Livewire\Vendor;

use App\Models\Vendor;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\VendorStatement;
use Illuminate\Support\Facades\Auth;

#[Title('Vendor Reports')]
class VendorReports extends Component
{


    // just for viewing purpose
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $rows = 10;
    public $vendors;

    // working purpose
    public $datefilter;
    public $vendor_id;

    public function render()
    {

        if ($this->datefilter && $this->vendor_id && $this->search) {
            $explode = explode(' - ', $this->datefilter);
            $start = date('Y-m-d', strtotime($explode[0])) . ' 00:00:00';
            $end = date('Y-m-d', strtotime($explode[1])) . ' 23:59:59';
            $statements = VendorStatement::with('vendor')->whereNull('deleted_at')->whereHas('vendor', function ($query) {
                $query->where('id', $this->vendor_id);
            })
                ->where('source', 'like', '%' . $this->search . '%')
                ->orWhere('amount', 'like', '%' . $this->search . '%')
                ->orWhere('pay_via', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->whereBetween('created_at', [$start, $end])->orderBy('id', 'desc')->paginate($this->rows);
        } elseif ($this->datefilter && $this->vendor_id) {
            $explode = explode(' - ', $this->datefilter);
            $start = date('Y-m-d', strtotime($explode[0])) . ' 00:00:00';
            $end = date('Y-m-d', strtotime($explode[1])) . ' 23:59:59';
            $statements = VendorStatement::with('vendor')->whereNull('deleted_at')->whereHas('vendor', function ($query) {
                $query->where('id', $this->vendor_id);
            })->whereBetween('created_at', [$start, $end])->orderBy('id', 'desc')->paginate($this->rows);
        } elseif ($this->vendor_id && $this->search) {
            $statements = VendorStatement::with('vendor')->whereNull('deleted_at')->whereHas('vendor', function ($query) {
                $query->where('id', $this->vendor_id);
            })->where('source', 'like', '%' . $this->search . '%')
                ->orWhere('amount', 'like', '%' . $this->search . '%')
                ->orWhere('pay_via', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')->paginate($this->rows);
        } elseif ($this->datefilter) {
            $explode = explode(' - ', $this->datefilter);
            $start = date('Y-m-d', strtotime($explode[0])) . ' 00:00:00';
            $end = date('Y-m-d', strtotime($explode[1])) . ' 23:59:59';
            $statements = VendorStatement::with('vendor')->whereNull('deleted_at')->whereBetween('created_at', [$start, $end])->orderBy('id', 'desc')->paginate($this->rows);
        } elseif ($this->vendor_id) {
            $statements = VendorStatement::with('vendor')->whereNull('deleted_at')->whereHas('vendor', function ($query) {
                $query->where('id', $this->vendor_id);
            })->orderBy('id', 'desc')->paginate($this->rows);
        } elseif ($this->search) {
            $statements = VendorStatement::with('vendor')->whereNull('deleted_at')->where('source', 'like', '%' . $this->search . '%')->orWhere('amount', 'like', '%' . $this->search . '%')->orWhere('pay_via', 'like', '%' . $this->search . '%')->orWhere('created_at', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate($this->rows);
        } else {
            $statements = VendorStatement::with('vendor')->whereNull('deleted_at')->orderBy('id', 'desc')->paginate($this->rows);
        }

        return view('livewire.vendors.vendor-reports', ['statements' => $statements]);
    }

    public function mount()
    {
        $this->vendors = Vendor::get();
    }

    public function delete($id)
    {
        $VendorStatement = VendorStatement::find($id);
        $VendorStatement->deleted_at = now();
        $VendorStatement->deleted_by = Auth::user()->id;
        $VendorStatement->save();

        $this->dispatch('swal', [
            'title' => 'Vendor Statement Deleted Successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }
}

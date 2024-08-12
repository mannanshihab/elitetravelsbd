<?php

namespace App\Livewire\Vendor;

use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Vendors List')]
class VendorsList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $rows = 10;

    public function render()
    {
        if($this->search){
            $vendors = Vendor::whereNull('deleted_at')->where('vendor_name', 'like', '%'.$this->search.'%')
            ->orWhere('mobile', 'like', '%'.$this->search.'%')
            ->orWhere('address', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'desc')->paginate($this->rows);
            
        }else{
            $vendors = Vendor::whereNull('deleted_at')->orderBy('id', 'desc')->paginate($this->rows);
        }

        return view('livewire.vendors.vendors-list', ['vendors' => $vendors]);
    }

    public function delete($id)
    {
        $Vendor = Vendor::find($id);
        $Vendor->deleted_at = now();
        $Vendor->deleted_by = Auth::user()->id;
        $Vendor->save();
        
        $this->dispatch('swal', [
            'title' => 'Vendor deleted successfully.',
            'icon' => 'success',
        ]);
        // return redirect()->back()->with('success', 'Vendor Deleted Successfully');
    }
}

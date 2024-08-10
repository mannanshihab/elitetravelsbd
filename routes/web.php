<?php

use App\Livewire\Home;
use App\Models\Invoice;
use App\Livewire\Auth\Login;
use App\Livewire\InvoicePrint;
use App\Livewire\User\AddUsers;
use App\Livewire\User\UserList;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Livewire\Agent\AddAgents;
use App\Livewire\Agent\AgentsList;
use App\Livewire\Agent\EditAgents;
use App\Livewire\Vendor\AddVendors;
use App\Livewire\Agent\AddAgentBill;
use App\Livewire\Agent\AgentReports;
use App\Livewire\Invoice\AddInvoice;
use App\Livewire\Vendor\EditVendors;
use App\Livewire\Vendor\VendorsList;
use App\Livewire\Invoice\EditInvoice;
use App\Livewire\Invoice\InvoiceList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Customer\AddCustomer;
use App\Livewire\Employee\AddEmployee;
use App\Livewire\User\ProfileSettings;
use App\Livewire\Vendor\AddVendorBill;
use App\Livewire\Vendor\VendorReports;
use App\Livewire\Customer\CustomerList;
use App\Livewire\Customer\EditCustomer;
use App\Livewire\Employee\EditEmployee;
use App\Livewire\Employee\EmployeeList;
use App\Livewire\Invoice\InvoicePreview;


Route::get('/asdf/{id}', function(){
    $invoice = Invoice::with('customer', 'billed')->where('invoice', '655655')->first();
    return view('livewire.invoice-print', ['invoice' => $invoice]);
});



Route::middleware('guest')->group(function () {
    Route::get('/', Login::class)->name('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/logout', [Home::class, 'logout'])->name('logout');

    
    Route::get('/profile', ProfileSettings::class)->name('profile');
    Route::get('/home', Home::class)->name('home');

    Route::get('invoice', AddInvoice::class)->name('invoice');
    Route::get('invoice-list', InvoiceList::class)->name('invoice-list');
    Route::get('invoice-edit/{invoice_id}', EditInvoice::class)->name('invoice-edit');
    Route::get('invoice-show/{invoice_id}', InvoicePreview::class)->name('invoice-show');
    Route::get('invoice-print/{invoice_id}', InvoicePrint::class)->name('invoice-print');

    Route::get('add-customer', AddCustomer::class)->name('add-customer');
    Route::get('edit-customer/{id}', EditCustomer::class)->name('edit-customer');
    Route::get('list-customer', CustomerList::class)->name('list-customer');

    Route::get('/add-users', AddUsers::class)->name('add-users');
    // Route::get('/edit-users/{id}', AddUsers::class)->name('edit-users');
    Route::get('/list-users', UserList::class)->name('list-users');

    Route::get('/add-employee', AddEmployee::class)->name('add-employee');
    Route::get('/edit-employee/{id}', EditEmployee::class)->name('edit-employee');
    Route::get('/list-employees', EmployeeList::class)->name('list-employees');

    Route::get('add-agent', AddAgents::class)->name('add-agent');
    Route::get('edit-agent/{id}', EditAgents::class)->name('edit-agent');
    Route::get('list-agent', AgentsList::class)->name('list-agent');
    
    Route::get('add-vendor', AddVendors::class)->name('add-vendor');
    Route::get('edit-vendor/{id}', EditVendors::class)->name('edit-vendor');
    Route::get('list-vendor', VendorsList::class)->name('list-vendor');

    Route::get('add-agent-bill', AddAgentBill::class)->name('add-agent-bill');
    Route::get('agent-reports', AgentReports::class)->name('agent-reports');
    Route::get('add-vendor-bill', AddVendorBill::class)->name('add-vendor-bill');
    Route::get('vendor-reports', VendorReports::class)->name('vendor-reports');
});


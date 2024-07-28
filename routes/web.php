<?php

use App\Livewire\AddAgents;
use App\Livewire\AddCustomer;
use App\Livewire\AddEmployee;
use App\Livewire\AddInvoice;
use App\Livewire\AddUsers;
use App\Livewire\AddVendors;
use App\Livewire\AgentsList;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\CustomerList;
use App\Livewire\EditAgents;
use App\Livewire\EditCustomer;
use App\Livewire\EditEmployee;
use App\Livewire\EditVendors;
use App\Livewire\EmployeeList;
use App\Livewire\Home;
use App\Livewire\InvoiceList;
use App\Livewire\ProfileSettings;
use App\Livewire\UserList;
use App\Livewire\VendorsList;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {
    Route::get('/', Login::class)->name('login');
    Route::get('/register', Register::class);
    Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
});


Route::middleware('auth')->group(function () {
    Route::get('/logout', [Home::class, 'logout'])->name('logout');

    
    Route::get('/profile', ProfileSettings::class)->name('profile');
    Route::get('/home', Home::class)->name('home');

    Route::get('invoice', AddInvoice::class)->name('invoice');
    Route::get('invoice-list', InvoiceList::class)->name('invoice-list');

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



});


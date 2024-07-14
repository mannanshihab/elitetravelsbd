<?php

use App\Livewire\AddAgents;
use App\Livewire\AddCustomer;
use App\Livewire\AddInvoice;
use App\Livewire\AddVendors;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\CustomerList;
use App\Livewire\Form;
use App\Livewire\Home;
use App\Livewire\ProfileSettings;
use App\Livewire\UserList;
use Illuminate\Support\Facades\Route;


Route::get('/asdf', function () {
    return view('content.tables.tables-datatables-advanced');
});



Route::middleware('guest')->group(function () {
    Route::get('/', Login::class)->name('login');
    Route::get('/register', Register::class);
    Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
    
    Route::get('/test', function(){
        //return view('content.apps.app-logistics-dashboard');
        //return view('content.laravel-example.user-management');
        //return view('content.cards.cards-actions');
        //return view('content.modal.modal-examples');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/logout', [Home::class, 'logout'])->name('logout');

    
    Route::get('/profile', ProfileSettings::class)->name('profile');
    Route::get('/home', Home::class)->name('home');
    Route::get('/form', Form::class)->name('form');



    Route::get('invoice', AddInvoice::class)->name('invoice');
    Route::get('invoice-list', AddInvoice::class)->name('invoice-list');



    Route::get('add-customer', AddCustomer::class)->name('add-customer');
    Route::get('edit-customer/{id}', AddCustomer::class)->name('edit-customer');
    Route::get('list-customer', CustomerList::class)->name('list-customer');

    Route::get('/add-users', UserList::class)->name('add-users');
    Route::get('/edit-users/{id}', UserList::class)->name('edit-users');
    Route::get('/list-users', UserList::class)->name('list-users');

    Route::get('add-agent', AddAgents::class)->name('add-agent');
    Route::get('edit-agent/{id}', AddAgents::class)->name('edit-agent');
    Route::get('list-agent', AddAgents::class)->name('list-agent');
    
    Route::get('add-vendor', AddVendors::class)->name('add-vendor');
    Route::get('edit-vendor/{id}', AddVendors::class)->name('edit-vendor');
    Route::get('list-vendor', AddVendors::class)->name('list-vendor');


    
});

/* Route::get('/test', function(){
    return view('content.apps.app-logistics-dashboard');
}); */

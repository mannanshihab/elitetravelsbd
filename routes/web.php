<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Form;
use App\Livewire\Home;
use App\Livewire\ProfileSettings;
use App\Livewire\UserList;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){
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
Route::middleware('auth')->group(function(){
    Route::get('/logout', function(){
        auth()->logout();
        return redirect('/');
    })->name('logout');
    
    Route::get('/profile', ProfileSettings::class)->name('profile');    
    Route::get('/home', Home::class)->name('home');
    Route::get('/form', Form::class)->name('form');
    Route::get('/users', UserList::class)->name('users');
    
});

/* Route::get('/test', function(){
    return view('content.apps.app-logistics-dashboard');
}); */



<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Form;
use App\Livewire\Home;
use App\Livewire\ProfileSettings;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){
    Route::get('/', Login::class)->name('login');
    Route::get('/register', Register::class);
    Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
});
Route::middleware('auth')->group(function(){
    Route::get('/logout', function(){
        auth()->logout();
        return redirect('/');
    })->name('logout');
    
    Route::get('/profile', ProfileSettings::class);    
    Route::get('/home', Home::class);
    Route::get('/form', Form::class);
});

/* Route::get('/test', function(){
    return view('content.apps.app-logistics-dashboard');
}); */



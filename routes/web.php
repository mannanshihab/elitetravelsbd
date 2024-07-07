<?php

use App\Livewire\FormLayouts\FormLayoutsHorizontal;
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;


Route::get('/', Login::class);
Route::get('/register', Register::class);
Route::get('/home', Home::class);


Route::get('/test', function(){
    return view('content.apps.app-logistics-dashboard');
   /*  return view('_partials._modals.modal-add-new-address'); */
});

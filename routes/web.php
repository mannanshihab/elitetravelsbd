<?php

use App\Livewire\Form;
use App\Livewire\FormLayouts\FormLayoutsHorizontal;
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\form;

Route::get('/', Login::class);
Route::get('/register', Register::class);
Route::get('/home', Home::class);
Route::get('/form', Form::class);

Route::get('/test', function(){
    return view('content.apps.app-logistics-dashboard');
   /*  return view('_partials._modals.modal-add-new-address'); */
});

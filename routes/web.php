<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('contactos', ContactoController::class);

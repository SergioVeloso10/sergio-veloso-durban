<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;


Route::get('/', function () {
    return view('home');
});

Route::get('/cliente', function () {
    return view('cliente');
});

//Route::get('/cliente',[ClienteController::class,'store'])->name('cliente');

//Route::post('agregarCliente',[ClienteController::class, 'store'])->name('agregarCliente');
Route::get('/login', function () {
    return view('login');
});
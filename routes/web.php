<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;


Route::get('/home', function () {
    return view('home');
});

// rutas de cliente Usuario
Route::get('/cliente', function () {
    return view('cliente');
});

Route::post('/agregarusuario',[ClienteController::class, 'agregar'])->name('agregarusuario');

Route::get('/login', function () {
    return view('login');
});

Route::get('/registrar', function () {
    return view('registroCliente');
});

//rutas de venta
Route::get('/venta', function () {
    return view('venta');
});

Route::get('/ventaproducto/{idproductos}/{idcliente}',[ClienteController::class, 'ventaproducto']);
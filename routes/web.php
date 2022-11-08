<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CartController; 


Route::get('/home', function () {
    return view('home');
});

// rutas de cliente Usuario
Route::get('/cliente', function () {
    return view('cliente');
});

//Route::post('/agregarusuario',[ClienteController::class, 'agregar'])->name('agregarusuario');

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

Route::get('/venta/{idproductos}/{cantidad}',[CartController::class, 'add']);

Route::get('/eliminardelcarrito/{idproductos}',[CartController::class,'removeitem']);
//Route::get('/ventaproducto/{idproductos}/{idcliente}',[VentaController::class, 'ventaproducto']);


// rutas producto
Route::get('/detalle/{idproductos}',[ProductoController::class, 'detalle']);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CartController;  

// rutas de cliente Usuario
Route::get('/cliente', function () {    // muestra datos del cliente
    return view('cliente');
});

Route::get('/login', function () {      // muestra formulario de login 
    return view('login');
});

Route::get('/registrar', function () { // muestra formulario de registro
    return view('registroCliente');
});

//rutas de venta y Carrito
Route::get('/venta', function () {    // muestra el carrito con los productos seleccionados
    return view('venta');
});
Route::get('/detalleVenta/{idventa}',[VentaController::class,'verDetalleVenta'])->name('detalleVenta/{idventa}');

Route::get('/movimientos',[VentaController::class,'verMovimientos'])->name('movimientos');

Route::get('/misCompras',[VentaController::class,'verCompras'])->name('misCompras'); // cliente ve las compras que ha realizado

Route::get('/prueba', function () {
    return view('prueba');
});

Route::post('/comprarProducto',[VentaController::class, 'comprar'])->name('comprarProducto');

Route::get('/efectuarCompra/{carrito}/{tipoDocumento}',[VentaController::class,'comprar']); // se efectuaria la compra y boleta

Route::get('/venta/{idproductos}/{cantidad}',[CartController::class, 'add']); // agrega productos al carrito

Route::get('/eliminardelcarrito/{idproductos}',[CartController::class,'removeitem']); // elimina los productos del carrito



// rutas producto
Route::get('/',[ProductoController::class, 'index'])->name('');

Route::get('/detalle/{idproductos}',[ProductoController::class, 'detalle'])->name('detalle/{idproductos}'); // muestra el detalle de un producto. 

Route::get('/crearProducto',[ProductoController::class, 'create'])->name('crearProducto'); // muestra vista de formulario

Route::post('/agregarProducto',[ProductoController::class, 'agregar'])->name('agregarProducto'); // aca se crea un nuevo producto

Route::get('/indexProductoAdmin',[ProductoController::class,'indexAdmin'])->name('indexProductoAdmin'); // muestra productos para admin. 

Route::get('/editarProducto/{idproducto}',[ProductoController::class,'edit'])->name('editarProducto'); // nos manda a la vista del formulario editar 

Route::put('/editProducto/{idproducto}',[ProductoController::class,'editar'])->name('editProducto'); //edita los datos  

Route::get('/deleteProducto/{idproducto}',[ProductoController::class,'delete'])->name('deleteProducto');  
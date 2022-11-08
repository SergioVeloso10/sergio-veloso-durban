<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart; 


class CartController extends Controller
{
    public function add($idProducto,$cantidad)
    {
        $coneccion = connection();
        $sql = "SELECT * FROM productos where idproductos = " . $idProducto;
        $consulta = mysqli_query($coneccion, $sql);
        $fila = $consulta->fetch_assoc();

        Cart::add(
            $fila['idproductos'], 
            $fila['nombre'], 
            $fila['precio'], 
            $cantidad,
        );
        return back()->with('success',$fila['nombre'],"$ ¡se ha agregado con éxito al carrito!");
    }

    public function removeitem($idproducto) {
        //$producto = Producto::where('id', $request->id)->firstOrFail();
        Cart::remove([
        'id' => $idproducto,
        ]);
        return back()->with('success',"Producto eliminado con éxito de su carrito.");
    }
}

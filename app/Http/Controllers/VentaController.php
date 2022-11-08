<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function comprar($carrito, $tipoDocumento)
    {  
        $coneccion = connection();
        
        return view('prueba');
        
        // $sql = "SELECT * FROM productos where idproductos = " . $idProducto;
        // $consulta = mysqli_query($coneccion, $sql);
        //return redirect('home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysqli;
use Illuminate\Support\Facades\DB;
//use Session;
class ProductoController extends Controller
{
    public function detalle($idProducto)
    {
        $coneccion = connection();
        $sql = "SELECT * FROM productos where idproductos = " . $idProducto;
        $consulta = mysqli_query($coneccion, $sql);
        $fila = $consulta->fetch_assoc();
        return view("detalleProducto")->with('data', $fila);
    }

    public function index(){
        //nos conectamos a la base y hacemos las consulta
        // $coneccion = connection();                
        // $sql = "SELECT * FROM productos";
        // $consulta = mysqli_query($coneccion, $sql);
        // while(mysqli_fetch_array($consulta)){ 
        //     $producto = mysqli_fetch_assoc($consulta); 
        // }

        // return view('home')->with('producto',$producto);
    }
}

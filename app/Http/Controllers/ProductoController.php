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
        $coneccion = connection();                
        $sql = "SELECT * FROM productos";
        $consulta = mysqli_query($coneccion, $sql);
        return view('home', compact('consulta'));
    }

    public function agregar(Request $request){
        //coneccion con la base y hacemos la consulta. 
        $coneccion = connection(); 
        $sql = "INSERT INTO productos(nombre,sku,nserie,precio,estado) VALUES 
        ('$request->nombre','$request->sku','$request->numSerie','$request->precio','$request->estado')";
        mysqli_query($coneccion, $sql);
        //cerramos la coneccion. 
        $coneccion->close();
        return redirect('indexProductoAdmin'); 
    }

    public function editar(Request $request, $idproducto){ 
        $coneccion = connection(); 
        $sql = "UPDATE productos SET nombre='$request->nombre',sku='$request->sku',
        nserie = '$request->numSerie', precio = '$request->precio', estado = '$request->estado' 
        where idproductos = " . $idproducto;
        mysqli_query($coneccion, $sql);
        $coneccion->close();
        return redirect('indexProductoAdmin'); 
    }

    public function create(){
        return view('createProducto'); 
    }

    public function edit($idproducto){
        $coneccion = connection(); 
        $sql = "SELECT * FROM productos where idproductos = " . $idproducto;
        $consulta = mysqli_query($coneccion, $sql);
        $fila = $consulta->fetch_assoc();
        return view("editarProducto")->with('data', $fila);
    }

    public function indexAdmin(){
        $coneccion = connection();                
        $sql = "SELECT * FROM productos";
        $consulta = mysqli_query($coneccion, $sql);
        return view('indexAdmin', compact('consulta'));
    }

    public function delete($idproducto){
        $coneccion = connection(); 
        $sql = "DELETE FROM productos WHERE idproductos =" . $idproducto; 
        $consulta = mysqli_query($coneccion,$sql);
        return redirect()->action(
            [ProductoController::class, 'indexAdmin']
        ); 
    }
}

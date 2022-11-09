<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysqli;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function detalle($idProducto)
    {
        // se puede ver el detalle del producto seleccionado
        $coneccion = connection();
        $sql = "SELECT * FROM productos where idproductos = " . $idProducto;
        $consulta = mysqli_query($coneccion, $sql);
        $fila = $consulta->fetch_assoc();  
        return view("detalleProducto")->with('data', $fila);
    }

    public function index(){
        //Se ven todos los productos para comprarlos.
        $coneccion = connection();                
        $sql = "SELECT * FROM productos";
        $consulta = mysqli_query($coneccion, $sql);
        // hacemos sesion del usuario. 
        session_start();
        $_SESSION["id"] = 1;
        $_SESSION["rut"] = "54.896.458-k";
        $_SESSION["giro"] = "Venta";
        $_SESSION["razon"] = "Libreria Giorgio";
        $_SESSION["estado"] = "A";

        return view('home', compact('consulta'));
    }

    public function agregar(Request $request){
        //coneccion con la base y hacemos el insert. 
        $coneccion = connection(); 
        $sql = "INSERT INTO productos(nombre,sku,nserie,precio,estado) VALUES 
        ('$request->nombre','$request->sku','$request->numSerie','$request->precio','$request->estado')";
        mysqli_query($coneccion, $sql);
        //cerramos la coneccion. 
        $coneccion->close();
        return redirect('indexProductoAdmin'); 
    }

    public function editar(Request $request, $idproducto){ 
        //editamos un producto, que viene identificado por la id. 
        $coneccion = connection(); 
        $sql = "UPDATE productos SET nombre='$request->nombre',sku='$request->sku',
        nserie = '$request->numSerie', precio = '$request->precio', estado = '$request->estado' 
        WHERE idproductos = " . $idproducto;
        mysqli_query($coneccion, $sql);
        $coneccion->close();
        return redirect('indexProductoAdmin'); 
    }

    public function create(){
        //nos muestra el formulario de creacion de un producto. 
        return view('createProducto'); 
    }

    public function edit($idproducto){
        //nos muestra un formulario para editar los campos del producto seleccionado. 
        $coneccion = connection(); 
        $sql = "SELECT * FROM productos where idproductos = " . $idproducto;
        $consulta = mysqli_query($coneccion, $sql);
        $fila = $consulta->fetch_assoc();
        return view("editarProducto")->with('data', $fila);
    }

    public function indexAdmin(){
        //muestra toda la informacion de los productos para el administrador, 
        $coneccion = connection();                
        $sql = "SELECT * FROM productos";
        $consulta = mysqli_query($coneccion, $sql);
        return view('indexAdmin', compact('consulta'));
    }

    public function delete($idproducto){
        //elimina un producto seleccionado. 
        $coneccion = connection(); 
        $sql = "DELETE FROM productos WHERE idproductos =" . $idproducto; 
        $consulta = mysqli_query($coneccion,$sql);
        return redirect()->action(
            [ProductoController::class, 'indexAdmin']
        ); 
    }
}

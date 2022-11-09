<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function comprar(Request $request)
    {   
        session_start();
        $data = json_decode($request->data); //recibe todos la informacion del carrito. 
        $tipoDocumento = $request->select;  
        $idCliente = $_SESSION["id"];
        date_default_timezone_set("America/Santiago"); 
        $fecha= date("d/m/y H:i:s"); 
        $folio = rand(1, 9999999);
        // nos conectamos a la base de datos
        $coneccion = connection(); 
        //insertamos datos en venta.
        $sql = "INSERT INTO venta(folio,fecha,clientes_idclientes,tipos_documentos_idtipos_documentos) VALUES 
        ('$folio','$fecha','$idCliente','$tipoDocumento')";
        mysqli_query($coneccion, $sql);
        $coneccion->close();
        //Insertamos datos en detalle venta
        


        

        return view('prueba',compact('data'));
    }

    public function verCompras(){
        session_start();
        $coneccion = connection(); 
        //recuperamos la id del cliente con la sesion 
        $idCliente = $_SESSION["id"];
        //hacemos la consulta para encontrar las compras que hizo el cliente. 
        $sql = "SELECT * FROM venta WHERE clientes_idclientes = " . $idCliente;
        $consulta = mysqli_query($coneccion, $sql);
        return view('compras', compact('consulta'));
    }
}

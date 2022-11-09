<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart; 

class VentaController extends Controller
{
    public function comprar(Request $request)
    {   
        session_start();
        $data = json_decode($request->data); //recibe todos la informacion del carrito. 
        $tipoDocumento = $request->select;  
        $idCliente = $_SESSION["id"];
        date_default_timezone_set("America/Santiago"); 
        $fecha= date("y/m/d H:i:s"); 
        $folio = rand(1, 9999999);
        // // nos conectamos a la base de datos
        $coneccion = connection(); 
        //insertamos datos en venta.
        $sql = "INSERT INTO venta(folio,fecha,clientes_idclientes,tipos_documentos_idtipos_documentos) VALUES 
        ('$folio','$fecha','$idCliente','$tipoDocumento')";
        mysqli_query($coneccion, $sql);
        $coneccion->close();

        //obtenemos la id de la venta que acabamos de registrar. 
        $coneccion = connection();
        $sql = "SELECT idventa FROM venta WHERE folio = " . $folio; 
        $idventa = mysqli_query($coneccion, $sql);
        $idventa = $idventa->fetch_assoc();
        $idventa = $idventa['idventa']; 
        $coneccion->close();

        $estado = "D";
        //insertamos los datos en detalle venta
        foreach ($data as $item){
            $neto = $item->precio * 0.81; 
            $coneccion = connection();
            $sql = "INSERT INTO detalleventa
            (fecha,cantidad,neto,subtotal,estado,venta_idventa,productos_idproductos) VALUES
            ('$fecha','$item->cantidad','$neto','$item->precio','$estado','$idventa','$item->id')"; 
            mysqli_query($coneccion, $sql);
            $idDetalleVenta = $coneccion->insert_id; //recoje la id que inserto 
            $coneccion->close();

            //insertamos datos en movimientos. 

            $coneccion = connection(); 
            $sql = "INSERT INTO movimientos
            (fecha,detalleventa_iddetalleventa,detalleventa_venta_idventa, detalleventa_productos_idproductos)
            VALUES ('$fecha', '$idDetalleVenta','$idventa','$item->id')"; 
            mysqli_query($coneccion, $sql);
            $coneccion->close();
        }
        Cart::clear();

        return redirect()->action(
            [ProductoController::class, 'index']
        ); 

        //aca se deberia eliminar las cosas del carrito. 
    }

    public function verCompras(){
        session_start();
        $coneccion = connection(); 
        //recuperamos la id del cliente con la sesion 
        $idCliente = $_SESSION["id"];
        //hacemos la consulta para encontrar las compras que hizo el cliente. 
        $sql = "SELECT * FROM venta v 
        JOIN tipos_documentos td ON v.tipos_documentos_idtipos_documentos = td.idtipos_documentos
        WHERE clientes_idclientes = " . $idCliente;
        $consulta = mysqli_query($coneccion, $sql);
        return view('compras', compact('consulta'));
    }

    public function verDetalleVenta($idVenta){
        $coneccion = connection(); 
        $sql = "SELECT * FROM detalleventa 
        JOIN productos ON detalleventa.productos_idproductos = productos.idproductos
        WHERE venta_idventa = " . $idVenta; 
        $consulta = mysqli_query($coneccion, $sql);
         
        return view('detalleVenta',compact('consulta')); 
    }

    public function verMovimientos(){

        $coneccion = connection(); 
        $sql = "SELECT m.* , p.nombre from movimientos m 
        join detalleventa dv on m.detalleventa_iddetalleventa = dv.iddetalleventa
        join venta v on dv.venta_idventa = v.idventa
        join productos p on p.idproductos = dv.productos_idproductos";
        $consulta = mysqli_query($coneccion, $sql); 

        return view('movimientos',compact('consulta'));  
    }

}

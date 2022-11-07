<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysqli;
use Illuminate\Support\Facades\DB;
//use Session;


class ProductoController extends Controller
{

    public function detalle($idProducto){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydb";

        $coneccion = new mysqli($servername, $username, $password, $dbname);
        if ($coneccion->connect_error) {
            die("Connection failed: " . $coneccion->connect_error);
        }

        $sql = "SELECT * FROM productos";
        $consulta = mysqli_query($coneccion, $sql);

        while( $aux = mysqli_fetch_array($consulta)){
            $idproducto = $aux['idproductos'];
            $nombreproducto = $aux['nombre'];
            $precioproducto = $aux['precio'];

            if(strtoupper($idproducto) == strtoupper($idProducto)){
                $check = true;
                session_start();
                $_SESSION["idProducto"]= $idproducto;
                $_SESSION["nombreproducto"]= $nombreproducto;
                $_SESSION["precioproducto"]= $precioproducto;
                break;
            }else{
                $check = false;
            }
        }
        // podriamos retornar un mensaje diciendo que no esta el producto
        return view('detalleProducto');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

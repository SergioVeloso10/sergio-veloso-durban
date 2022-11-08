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
        $nombreproducto = $fila['nombre'];
        $precioproducto = $fila['precio'];
        $idproducto = $fila['idproductos'];

        return view("detalleProducto")->with('data', $fila);
    }

    public function index()
    {
        //
    }
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

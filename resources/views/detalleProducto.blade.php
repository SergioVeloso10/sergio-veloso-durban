{{
$id = $_SESSION["id"],
$precio = $_SESSION["precioproducto"],
$nombre = $_SESSION["nombreproducto"],
}}

@extends('layout')

@section('titulo')
<h1>Detalle de: {{$nombre}}</h1>
@endsection
@section('seccion')

<p> Imagen de {{$nombre}} </p>
<p> Precio: {{$precio}} </p>
<p> Cantidad que desea comprar:  </p>
<p> Tipo de Documento: </p>
<p> Boton Comprar </p>

@endsection
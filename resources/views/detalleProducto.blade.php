@extends('layout')

@section('titulo')
<h1>Detalle de: </h1>
@endsection
@section('seccion')

<p> Imagen de {{$data['nombre']}} </p>
<p> Precio: {{$data['precio']}}</p>
<p> Cantidad que desea comprar:  </p>
<p> Tipo de Documento: </p>
{{--<a href="home" class="btn btn-primary">Menu</a>
<a href="ventas">Comprar</a>--}}

@endsection
@extends('layout')

@section('titulo')
<h1>Detalle de: {{$data['nombre']}}</h1>
@endsection
@section('seccion')

<p> Precio: $ {{$data['precio']}}</p>
<p> Sku : {{$data['sku']}}
<p> Numero Serie : {{$data['nserie']}}
<p> Estado : {{$data['estado']}}
<br>
<br>

<a href="{{ url()->previous() }}" class="btn btn-primary">Regresar</a>
<a href="/venta/<?=$data['idproductos']?>/1" class="btn btn-primary">+<i class="fas fa-shopping-cart"></i></a>

@endsection

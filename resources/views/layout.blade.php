@extends('adminlte::page')

@section('title')

@section('content_header')
<section>
    @yield('titulo')
</section>
@stop

@section('content')
    <section>
        @yield('seccion')
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

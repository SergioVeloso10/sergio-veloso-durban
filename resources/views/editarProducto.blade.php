@extends('layout')

@section('titulo')
<h1 class="font-weight-bold mb-4">Editar Producto (Solo Admin)</h1>
@endsection
@section('seccion')
<div>
    <body class="">
        <div id="divInsertar">
            <form action={{route('editProducto',$data['idproductos'])}} method="POST">
            @method('PUT')
            @csrf
            <div class="px-lg-5 pt-lg-4 p-4">
                <h3 class="font-weight-bold mb-4 text-center"> Editar campos</h3>
                <div class="mb-4">
                    <label for="nombre" class="form-label font-weight-bold">Nombre</label>
                    <input required type="text" maxlength="50" class="form-control border-0" value="{{$data['nombre']}}" placeholder="nombre" name="nombre">
                </div>

                <div class="mb-4">
                    <label for="Numero Serie" class="form-label font-weight-bold">Numero de Serie</label>
                    <input required type="text" maxlength="15" class="form-control border-0" value="{{$data['nserie']}}" placeholder="1324-5635-7854" name="numSerie">
                </div>

                <div class="mb-4">
                    <label for="Sku" class="form-label font-weight-bold">Sku</label>
                    <input required type="text" maxlength="5" class="form-control border-0" value="{{$data['sku']}}" placeholder="12345" name="sku">
                </div>
    
                <div class="mb-4">
                    <label for="precio" class="form-label font-weight-bold">Precio $</label>
                    <input required type="number" class="form-control border-0" value="{{$data['precio']}}" placeholder="4999" name="precio">
                </div>

                <div class="mb-4">
                    <label for="estado" class="form-label font-weight-bold">Estado</label>
                    <input required type="text" maxlength="1" class="form-control border-0" value="{{$data['estado']}}" placeholder="D" name="estado">
                </div>
    
                <input style="width:200px" class="btn btn-dark w-100" type="submit" value="Editar" />
            </div>
            </form>
        </div>
    </body>
</div>
@endsection
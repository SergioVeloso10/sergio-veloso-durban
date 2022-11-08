@extends('layout')

@section('titulo')
<h1 class="font-weight-bold mb-4">Crear Nuevo Producto (Solo Admin)</h1>
@endsection
@section('seccion')
<div>
    <body class="">
        <div id="divInsertar">
            <form action={{route('agregarProducto')}} method="POST">
            @csrf
            <div class="px-lg-5 pt-lg-4 p-4">
                <h3 class="font-weight-bold mb-4 text-center"> Ingresar Producto</h3>
                <div class="mb-4">
                    <label for="nombre" class="form-label font-weight-bold">Nombre</label>
                    <input required type="text" maxlength="50" class="form-control border-0" id="exampleInputEmail1" placeholder="nombre" name="nombre">
                </div>

                <div class="mb-4">
                    <label for="Numero Serie" class="form-label font-weight-bold">Numero de Serie</label>
                    <input required type="text" maxlength="15" class="form-control border-0" id="exampleInputEmail1" placeholder="1324-5635-7854" name="numSerie">
                </div>

                <div class="mb-4">
                    <label for="Sku" class="form-label font-weight-bold">Sku</label>
                    <input required type="text" maxlength="5" class="form-control border-0" id="exampleInputEmail1" placeholder="12345" name="sku">
                </div>
    
                <div class="mb-4">
                    <label for="precio" class="form-label font-weight-bold">Precio $</label>
                    <input required type="number" class="form-control border-0" id="exampleInputEmail1" placeholder="4999" name="precio">
                </div>

                <div class="mb-4">
                    <label for="estado" class="form-label font-weight-bold">Estado</label>
                    <input required type="text" maxlength="1" class="form-control border-0" id="exampleInputEmail1" placeholder="D" name="estado">
                </div>
    
                <input style="width:200px" class="btn btn-dark w-100" type="submit" value="Guardar" />
            </div>
            </form>
        </div>
    </body>
</div>
@endsection
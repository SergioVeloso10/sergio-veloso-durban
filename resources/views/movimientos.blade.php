@extends('layout')

@section('titulo')
<h1>Ver movimientos</h1>
@endsection
@section('seccion')

<div>
    <table class="table table-striped table-bordered mt-2 p-3 bg-light">
        <thead class="bg-success text-white">
            <tr>
                <th>Fecha</th>
                <th>Id Detalle Venta</th>
                <th>Id Venta</th>
                <th>Producto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while( $item = mysqli_fetch_array($consulta)){     
            ?>
            <tr>
                <td><?php echo $item['fecha']?></td>
                <td><?php echo $item['detalleventa_iddetalleventa']?></td>
                <td><?php echo $item['detalleventa_venta_idventa']?></td> 
                <td><?php echo $item['nombre']?></td> 
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<br><br>

<a href="{{ url()->previous() }}" class="btn btn-primary">Regresar</a>

@endsection

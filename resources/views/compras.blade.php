@extends('layout')

@section('titulo')
<h1>Compras de {{$_SESSION["razon"]}}</h1>
@endsection
@section('seccion')
<div>
    <table class="table table-striped table-bordered mt-2 p-3 bg-light">
        <thead class="bg-success text-white">
            <tr>
                <th>Id Venta</th>
                <th>Rut</th>
                <th>Tipo Documento</th>
                <th>Fecha</th>
                <th>Folio</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while( $venta = mysqli_fetch_array($consulta)){     
            ?>
            
            <tr>
                <td><?php echo $venta['idventa'] ?></td>
                <td><?php echo $_SESSION["rut"] ?></td>
                <td><?php echo $venta['tipo'] ?></td>
                <td><?php echo $venta['fecha'] ?></td>
                <td><?php echo $venta['folio'] ?></td>
                <td>
                    <a href="detalleVenta/{{$venta['idventa']}}" class="btn btn-primary">Ver Detalle Venta</a>
                </td>     
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
@endsection

@extends('layout')

@section('titulo')
<h1>Detalle de Venta</h1>
@endsection
@section('seccion')
<?php  $total=0; ?>
<div>
    <table class="table table-striped table-bordered mt-2 p-3 bg-light">
        <thead class="bg-success text-white">
            <tr>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Neto</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Id venta</th>
                <th>Producto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while( $item = mysqli_fetch_array($consulta)){     
            ?>
            <tr>
                <td><?php echo $item['fecha']?></td>
                <td><?php echo $item['cantidad']?></td>
                <td><?php echo $item['neto']?></td> 
                <td><?php echo $item['subtotal']?></td>
                <?php $total = $total + ($item['subtotal'] * $item['cantidad']); ?> 
                <td><?php echo $item['estado']?></td>
                <td><?php echo $item['venta_idventa']?></td>
                <td><?php echo $item['nombre']?></td>  
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<br><br>
<div>
    <h3> Valor neto $ {{$total * 0.81}} </h3>
        <br>
    <h2> Valor total $ {{$total}} </h2>
</div>

<a href="{{ url()->previous() }}" class="btn btn-primary">Regresar</a>

@endsection

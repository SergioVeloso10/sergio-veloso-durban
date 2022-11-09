@extends('layout')

@section('titulo')
<h1 class="font-weight-bold mb-4">Administrar Productos (Solo Admin)</h1>
@endsection
@section('seccion')
<div>
    <table class="table table-striped table-bordered mt-2 p-3 bg-light">
        <thead class="bg-success text-white">
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Sku</th>
                <th>Num Serie</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while( $producto = mysqli_fetch_array($consulta)){     
            ?>
            <tr>
                <td><?php echo $producto['nombre']?></td>
                <td><?php echo $producto['precio']?></td>
                <td><?php echo $producto['sku']?></td>
                <td><?php echo $producto['nserie']?></td> 
                <td><?php echo $producto['estado']?></td>
                <td>
                    <a href="editarProducto/<?=$producto['idproductos']?>" class="btn btn-success">Editar</a>
                    <a href="deleteProducto/<?=$producto['idproductos']?>" class="btn btn-danger">Eliminar</a>
                </td>     
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
@endsection

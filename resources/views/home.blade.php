@extends('layout')

@section('titulo')
    <h1>Productos</h1>
@endsection

@section('seccion')
<?php
    //nos conectamos a la base y hacemos las consulta
    $coneccion = connection();                
    $sql = "SELECT * FROM productos";
    $consulta = mysqli_query($coneccion, $sql);
    
    // consultamos con datos que vendrian del login 
    $rutGuardado= "191223047"; 
    $sqlUsuario= "SELECT * FROM clientes WHERE rutCliente = '$rutGuardado'";
    $consulta2 = mysqli_query($coneccion, $sqlUsuario);
    // usamos una id inventada
    $idCliente = 2;  
?>

{{-- tabla que muestra todos los productos --}}
<table class="table table-striped table-bordered mt-2 p-3 bg-light">
    <thead class="bg-success text-white">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while( $producto = mysqli_fetch_array($consulta)){     
        ?>
        
        <tr>
            <td><?php echo $producto['nombre'] ?></td>
            <td><?php echo $producto['precio'] ?></td>
            <td>
                <a href="detalle/<?=$producto['idproductos']?>" class="btn btn-primary">Ver Producto</a>
                <a href="/venta/<?=$producto['idproductos']?>/1" class="btn btn-primary">+<i class="fas fa-shopping-cart"></i></a>
            </td>     
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

@endsection

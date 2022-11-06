@extends('layout')

@section('titulo')
    <h1>Productos</h1>
@endsection

@section('seccion')
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    $coneccion = new mysqli($servername, $username, $password, $dbname);
    if ($coneccion->connect_error) {
        die("Connection failed: " . $coneccion->connect_error);
    }
                    
    $sql = "SELECT * FROM productos";
    $consulta = mysqli_query($coneccion, $sql);
    
    // consultamos con datos que vendrian del login 
    $rutGuardado= "191223047"; 
    $sqlUsuario= "SELECT * FROM clientes WHERE rutCliente = '$rutGuardado'";
    $consulta2 = mysqli_query($coneccion, $sqlUsuario);
    // usamos una id inventada
    $idCliente = 2;  
?>

<table class="table table-striped table-bordered mt-2 p-3 bg-light">
    <thead class="bg-success text-white">
        <tr>
            <th>Numero de serie</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while( $producto = mysqli_fetch_array($consulta)){     
        ?>
        
        <tr>
            <td><?php echo $producto['nserie'] ?></td>
            <td><?php echo $producto['nombre'] ?></td>
            <td><?php echo $producto['precio'] ?></td>
            <td>0</td>
            <td>
                <a href={{url('ventaproducto',[$producto['idproductos']],$idCliente)}} class="btn btn-primary">Comprar</a>
            </td>
         
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

@endsection

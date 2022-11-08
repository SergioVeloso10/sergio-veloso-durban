@extends('layout')

@section('titulo')
<h1>Carrito de Compra</h1>
@endsection
@section('seccion')
<p> 
    <div class="container">
    <div class="row">
       <div class="col-sm-12 bg-light">
           @if (count(Cart::getContent()))
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                </thead>
                <tbody>
                    <?php $total = 0 ?>
                    @foreach (Cart::getContent() as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>
                                <a href="eliminardelcarrito/<?=$item->id?>" class="btn btn-danger">Eliminar</a>
                            </td>
                            <?php 
                            $total = $total + ($item->price * $item->quantity);
                            ?>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div>
                <p> Total a pagar: $ {{$total}} </p>
                <p> Tipo de documento : 
                    <select name="select" class="custom-select" style="width:200px;">
                        <option value="Boleta">Boleta</option>
                        <option value="Factura">Factura</option>
                     </select> 
                </p>
                <br><br>
                <a href="#" class="btn btn-success">Comprar</a>

            </div>

            @else
                <p>Carrito vacio</p>
           @endif

       </div>
       
    </div>
</div>
    
</p>

@endsection

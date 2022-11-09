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
                        <?php 
                        $total = 0;
                        $aux=[];
                        ?>
                        @foreach (Cart::getContent() as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <?php 
                                $data=new stdClass();
                                $data->id = $item->id; 
                                
                                ?>
                                <td>{{$item->name}}</td>
                                <?php 
                                $data->nombre = $item->name;
                                
                                ?>
                                <td>{{$item->price}}</td>
                                <?php 
                                $data->precio = $item->price;
                              
                                ?>
                                <td>{{$item->quantity}}</td>
                                <?php 
                                $data->cantidad = $item->quantity;
                                array_push($aux,$data); 
                                ?>
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
                <br><br>
                <?php $idCliente=1; ?> 
                <form action={{route('comprarProducto')}} method="POST">
                    @csrf
                    <label> Tipo de documento : </label>
                    <select name="select" id="select" class="custom-select" style="width:200px;">
                        <option value="1">Boleta</option>
                        <option value="2">Factura</option>
                    </select> 
                    <input class="d-none" type="text" id="data" name="data" value="{{json_encode($aux)}}">
                    <br><br><br>
                    <input style="width:200px" class="btn btn-primary" type="submit" value="Comprar"/>
                </form>   
            </div>
            
            @else
                <p>Carrito vacio</p>
           @endif

       </div>
       
    </div>
</div>
    
</p>

@endsection

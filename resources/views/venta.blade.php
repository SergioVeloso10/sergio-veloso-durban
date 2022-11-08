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
                        $aux = array();
                        $j = 0; 
                        ?>
                        @foreach (Cart::getContent() as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <?php 
                                $aux[$j] = $item->id;
                                $j = $j+1; 
                                ?>
                                <td>{{$item->name}}</td>
                                <?php 
                                $aux[$j] = $item->name;
                                $j = $j+1; 
                                ?>
                                <td>{{$item->price}}</td>
                                <?php 
                                $aux[$j] = $item->price;
                                $j = $j+1; 
                                ?>
                                <td>{{$item->quantity}}</td>
                                <?php 
                                $aux[$j] = $item->quantity;
                                $j = $j+1; 
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
                <p> Tipo de documento : 
                    <select name="select" class="custom-select" style="width:200px;">
                        <option value="Boleta" id="boleta">Boleta</option>
                        <option value="Factura" id="factura">Factura</option>
                     </select> 
                </p>
                
                <br><br>
                {{-- <a {{route("efectuarCompra.comprar",Cart::getContent(),"boleta")}} class="btn btn-success">Comprar</a> --}}
                {{-- <a href="efectuarCompra/{{$aux}}/boleta" class="btn btn-primary">Comprar</a> --}}
                <a href="efectuarCompra/4/boleta" class="btn btn-primary">Comprar</a>
            </div>

            @else
                <p>Carrito vacio</p>
           @endif

       </div>
       
    </div>
</div>
    
</p>

@endsection

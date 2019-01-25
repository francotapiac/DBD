@extends('layouts.vistaControlador')
@section('content')

<div class="container text-center" style="margin-top: 200px">
    <div class="page-header">
        <h1>Carrito de compras</h1>
        <div class="table-container">
          <table id="mytable" class="table table-bordred table-striped">
            <thead>
              <th>Tipo</th>
              <th>Nombre</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
              <th>Quitar</th>
            </thead>
            <tbody>
             
              @foreach($carro->servicios as $key=>$item)  
              <tr>
                <td>{{$item->categoria}}</td>
                <td>{{$item->nombre}}</td>
                <td>{{$item->cantidad}}</td>
                <td>{{$item->subtotal}}</td>

                <td>
                    <form method="DELETE" action="{{ route('borrarCarro') }}"  role="form">
                        {{ csrf_field() }}
                        <input type='hidden' name="indice" value = {{$key}} class="form-control">
                        
                        <button class="btn btn-danger btn-lg" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                </td>


               </tr>
               @endforeach 
              

            </tbody>
 
          </table>
          <p1>Total: </p1>{{$carro->total}}
        </div>
        
        <div class="button book_button"><a href="{{action('ReservaController@pagar')}}">Reservar<span></span><span></span><span></span></a></div>

        
    </div>
</div>  

@endsection

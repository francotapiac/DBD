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
              <th>Precio</th>
              <th>Quitar</th>
            </thead>
            <tbody>
              @if($actividads->count())  
              @foreach($actividads as $actividad)  
              <tr>
                <td>Actividad</td>
                <td>{{$actividad->nombre}}</td>
                <td>{{$actividad->costo}}</td>
                <td>
                    <form method="DELETE" action="{{ route('borrarCarro') }}"  role="form">
                        {{ csrf_field() }}
                        <input type='hidden' name="tipo" value = "actividad" class="form-control">
                        <input type='hidden' name="id_actividad" value = "{{$actividad->id_actividad}}" class="form-control">
                        <button class="btn btn-danger btn-lg" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                </td>


               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>

        
    </div>
</div>  

@endsection
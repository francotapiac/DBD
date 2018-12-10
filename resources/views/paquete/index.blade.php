@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de paquetes</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('paquete.create') }}" class="btn btn-info" >Añadir paquete</a>
            </div>
          </div>

          <!-- Buscador de paquetes -->
          <form class="form-group" method="GET" action="/paquete">
            <div class="row">
              <div class="col-md-12"></div>
                <div class="form-group col-md-4">
                  <label for="marca">Precio:</label>
                  <input type="numb" class="form-control" name="precio_por_persona">
                </div>
              <div class="form-group col-md-4">
                <label for="fecha">Descripción:</label>
                <input type="text" class="form-control" name="descripcion">
              </div>
             <div class="form-group col-md-4">
                <label for="ciudad">Descuento:</label>
                <input type="number" class="form-control" name="descuento">
             </div>
            <div class="row">
               <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-top:60px">
                  <button type="submit" class="btn btn-success">Buscar</button>
               </div>
            </div>
          </div>
        </form>
        
        <!-- Tabla con datos de paquetes -->
        <div class="table-container">
          <table id="mytable" class="table table-bordred table-striped">
            <thead>
              <th>Costo</th>
              <th>Descripción</th>
              <th>Descuento</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </thead>
            <tbody>
              @if($paquetes->count())  
              @foreach($paquetes as $paquete)  
              <tr>
                <td>{{$paquete->precio_por_persona}}</td>
                <td>{{$paquete->descripcion}}</td>
                <td>{{$paquete->descuento}}</td>
    
                <td><a class="btn btn-primary btn-xs" href="{{action('PaqueteController@edit', $paquete->id_paquete)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('PaqueteController@destroy', $paquete->id_paquete)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
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
      {{ $paquetes->links() }}
    </div>
  </div>
</section>
 
@endsection
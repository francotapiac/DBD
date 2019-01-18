@extends('vistaControladores.layouts')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Actividades</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('actividad.create') }}" class="btn btn-info" >Añadir Actividad</a>
            </div>
          </div>

          <!-- Buscador de actividades -->
          <form class="form-group" method="GET" action="/actividad">
            <div class="row">
              <div class="col-md-12"></div>
                <div class="form-group col-md-4">
                  <label for="marca">Nombre:</label>
                  <input type="text" class="form-control" name="nombre">
                </div>
              <div class="form-group col-md-4">
                <label for="fecha">Descripción:</label>
                <input type="text" class="form-control" name="descripcion">
              </div>
             <div class="form-group col-md-4">
                <label for="ciudad">Costo:</label>
                <input type="number" class="form-control" name="costo">
             </div>
            <div class="row">
               <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-top:60px">
                  <button type="submit" class="btn btn-success">Buscar</button>
               </div>
            </div>
          </div>
        </form>
        
        <!-- Tabla con datos de actividades -->
        <div class="table-container">
          <table id="mytable" class="table table-bordred table-striped">
            <thead>
              <th>Nombre</th>
              <th>Costo</th>
              <th>Detalle</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </thead>
            <tbody>
              @if($actividades->count())  
              @foreach($actividades as $actividad)  
              <tr>
                <td>{{$actividad->nombre}}</td>
                <td>{{$actividad->costo}}</td> 
                <td><a class="btn btn-info btn-xs" href="{{action('ActividadController@show', $actividad->id_actividad)}}" ><span class="glyphicon glyphicon-search"></span></a></td>
                <td><a class="btn btn-primary btn-xs" href="{{action('ActividadController@edit', $actividad->id_actividad)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('ActividadController@destroy', $actividad->id_actividad)}}" method="post">
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
      {{ $actividades->links() }}
    </div>
  </div>
</section>
 
@endsection
@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista aeropuertos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              @if(Auth::check())
                @if(Auth::user()->tieneRol('admin'))
                  <a href="{{ route('aeropuerto.create') }}" class="btn btn-info" >Añadir aeropuerto</a>
                @endif
              @endif
            </div>
          </div>

          <!-- Buscador de aeropuertos -->
          <form class="form-group" method="GET" action="/aeropuerto">
            <div class="row">
              <div class="col-md-12"></div>
                <div class="form-group col-md-4">
                  <label for="marca">Nombre:</label>
                  <input type="text" class="form-control" name="nombre_aeropuerto">
                </div>
              <div class="form-group col-md-4">
                <label for="fecha">Tipo:</label>
                <input type="number" class="form-control" name="tipo_aeropuerto">
              </div>
             <div class="form-group col-md-4">
                <label for="ciudad">Número:</label>
                <input type="text" class="form-control" name="numero_contacto">
             </div>
             <div class="form-group col-md-4">
                <label for="lugar">Lugar:</label>
                <input type="text" class="form-control" name="lugar">
             </div>
            <div class="row">
               <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-top:60px">
                  <button type="submit" class="btn btn-success">Buscar</button>
               </div>
            </div>
          </div>
        </form>
        
        <!-- Tabla con datos de aeropuertos -->
        <div class="table-container">
          <table id="mytable" class="table table-bordred table-striped">
            <thead>
              <th>Nombre</th>
              <th>Lugar</th>
              <th>Tipo</th>
              <th>Numero de contacto</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </thead>
            <tbody>
              @if($aeropuertos->count())  
              @foreach($aeropuertos as $aeropuerto)  
              <tr>
                <td>{{$aeropuerto->nombre_aeropuerto}}</td>
                <td>{{$aeropuerto->lugar->ciudad}},{{$aeropuerto->lugar->pais}}</td>
                <td>{{$aeropuerto->tipo_aeropuerto}}</td>
                <td>{{$aeropuerto->numero_contacto}}</td>
                @if(Auth::check())
                    @if(Auth::user()->tieneRol('admin'))
                      <td><a class="btn btn-primary btn-xs" href="{{action('AeropuertoController@edit', $aeropuerto->id_aeropuerto)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                      @endif
                    @endif
                  @if(Auth::check())
                    @if(Auth::user()->tieneRol('admin'))
                      <td>
                        <form action="{{action('AeropuertoController@destroy', $aeropuerto->id_aeropuerto)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
 
                          <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                      </td>
                      @endif
                    @endif
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
      {{ $aeropuertos->links() }}
    </div>
  </div>
</section>
 
@endsection
@extends('layouts.vistaControlador')
@section('content')

<div class="col-lg-11 ">
  <!-- Offers Sorting -->
  <div class="offers_sorting_container" style="margin-top: 200px">
      <ul class="offers_sorting">
          <!-- Botón crear -->
          @if(Auth::check())
            @if(Auth::user()->tieneRol('admin'))
          <a href="{{ route('vehiculo.create') }}" class="btn btn-info btn-lg" >Añadir Vehiculo</a>
            @endif
          @endif
      </ul>
  </div>
</div>

<div class="col-lg-12">
  <div class="offers_grid"  method="GET" action="/vehiculo">
    @if($vehiculos->count())  
      @foreach($vehiculos as $vehiculo) 
      <div class="offers_item rating_4">
        <div class="row"> 
            <div class="col-lg-1 temp_col"></div>
            <div class="col-lg-3 col-1680-4">
                <div class="offers_image_container">
                    <!-- Image by https://unsplash.com/@kensuarez -->
                    <div class="offers_image_background" style="background-image:url(imagenes/car.jpg)"></div>
                    <div class="offer_name"><a href="{{action('VehiculoController@show', $vehiculo->id_vehiculo)}}">{{$vehiculo->nombre}}</a></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="offers_content">
                    <div class="offers_price">${{$vehiculo->precio_diario}}</div>
                    <p class="offers_text">Nombre: {{$vehiculo->nombre}}</p>
                    <p class="offers_text">Capacidad: {{$vehiculo->capacidad}}</p>


                    <!-- Botón editar -->
                    @if(Auth::check())
                      @if(Auth::user()->tieneRol('admin'))
                    <div class="button book_button"><a href="{{action('VehiculoController@edit', $vehiculo->id_vehiculo)}}">Editar<span></span><span></span><span></span></a></div>
                      @endif
                    @endif

                    <!-- Botón Reservar -->
                    <div class="button book_button"><a href="{{action('VehiculoController@show', $vehiculo->id_vehiculo)}}">Reservar<span></span><span></span><span></span></a></div>
                    
                    <div class="offer_reviews">

                        <!-- Botón Borrar -->
                        @if(Auth::check())
                          @if(Auth::user()->tieneRol('admin'))
                        <form action="{{action('VehiculoController@destroy', $vehiculo->id_vehiculo)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger btn-lg" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
      </div>
    @endforeach 
    @else
    <td colspan="8">No hay registro !!</td>
    @endif
  </div>
  {{ $vehiculos->links() }}
</div>
@endsection

@extends('layouts.vistaControlador')
@section('content')

<div class="col-lg-11 ">
  <!-- Offers Sorting -->
  <div class="offers_sorting_container" style="margin-top: 200px">
      <ul class="offers_sorting">
          <!-- Botón crear -->
          @if(Auth::check())
                      @if(Auth::user()->tieneRol('admin'))
          <a href="{{ route('hotel.create') }}" class="btn btn-info btn-lg" >Añadir Hotel</a>
            @endif
          @endif
      </ul>
  </div>
</div>

<div class="col-lg-12">
  <div class="offers_grid"  method="GET" action="/hotel">
    @if($hotels->count())  
      @foreach($hotels as $hotel) 
      <div class="offers_item rating_4">
        <div class="row"> 
            <div class="col-lg-1 temp_col"></div>
            <div class="col-lg-3 col-1680-4">
                <div class5000offers_image_container">
                    <!-- Image by https://unsplash.com/@kensuarez -->
                    <div class="offers_image_background" style="background-image:url(imagenes/car.jpg)"></div>
                    <div class="offer_name"><a href="{{action('HotelController@show', $hotel->id_hotel)}}">Hotel {{$hotel->nombre}}</a></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="offers_content">
                    <div class="offers_text">Nombre: Hotel {{$hotel->nombre}}</div>
                    <div class="offers_text">Compañía: {{$hotel->compania}}</div>
                    <p class="offers_text">Descripción: {{$hotel->descripcion}}</p>
                    <p class="offers_text">Teléfono: {{$hotel->telefono}}</p>
                    <p class="offers_text">Calificación: {{$hotel->calificacion}}</p>
                    <div class="offers_icons">
                        <ul class="offers_icons_list">
                            <li class="offers_icons_item"><img src="imagenes/post.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/compass.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/bicycle.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/sailboat.png" alt=""></li>
                        </ul>
                    </div>

                    <!-- Botón editar -->
                    @if(Auth::check())
                      @if(Auth::user()->tieneRol('admin'))
                    <div class="button book_button"><a href="{{action('HotelController@edit', $hotel->id_hotel)}}">Editar<span></span><span></span><span></span></a></div>
                      @endif
                    @endif

                    <!-- Botón Reservar -->
                    <div class="button book_button"><a href="{{action('HotelController@show', $hotel->id_hotel)}}">Reservar<span></span><span></span><span></span></a></div>
                    
                    <div class="offer_reviews">

                        <!-- Botón Borrar -->
                        @if(Auth::check())
                          @if(Auth::user()->tieneRol('admin'))
                        <form action="{{action('HotelController@destroy', $hotel->id_hotel)}}" method="post">
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
  {{ $hotels->links() }}
</div> 
@endsection
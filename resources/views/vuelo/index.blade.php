@extends('layouts.vistaControlador')
@section('content')

<div class="col-lg-11 ">
  <!-- Offers Sorting -->
  <div class="offers_sorting_container" style="margin-top: 200px">
      <ul class="offers_sorting">
          <li>
              <span class="sorting_text">price</span>
              <i class="fa fa-chevron-down"></i>
              <ul>
                  <li class="sort_btn" data-isotope-option='{ "sortBy": "original-order" }' data-parent=".price_sorting"><span>show all</span></li>
                  <li class="sort_btn" data-isotope-option='{ "sortBy": "price" }' data-parent=".price_sorting"><span>ascending</span></li>
              </ul>
          </li>
          <li>
              <span class="sorting_text">location</span>
              <i class="fa fa-chevron-down"></i>
              <ul>
                  <li class="sort_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>default</span></li>
                  <li class="sort_btn" data-isotope-option='{ "sortBy": "name" }'><span>alphabetical</span></li>
              </ul>
          </li>
          <li>
              <span class="sorting_text">stars</span>
              <i class="fa fa-chevron-down"></i>
              <ul>
                  <li class="filter_btn" data-filter="*"><span>show all</span></li>
                  <li class="sort_btn" data-isotope-option='{ "sortBy": "stars" }'><span>ascending</span></li>
                  <li class="filter_btn" data-filter=".rating_3"><span>3</span></li>
                  <li class="filter_btn" data-filter=".rating_4"><span>4</span></li>
                  <li class="filter_btn" data-filter=".rating_5"><span>5</span></li>
              </ul>
          </li>
          <li class="distance_item">
              <span class="sorting_text">distance from center</span>
              <i class="fa fa-chevron-down"></i>
              <ul>
                  <li class="num_sorting_btn"><span>distance</span></li>
                  <li class="num_sorting_btn"><span>distance</span></li>
                  <li class="num_sorting_btn"><span>distance</span></li>
              </ul>
          </li>

          <!-- Botón crear si usuario ha iniciado sesión y es admin-->
          @if(Auth::check())
            @if(Auth::user()->tieneRol('admin'))
              <a href="{{ route('vuelo.create') }}" class="btn btn-info btn-lg" >Añadir vuelo</a>
            @endif
          @endif
      </ul>
  </div>
</div>

<div class="col-lg-12">
  <div class="offers_grid"  method="GET" action="/vuelo">
    @if($vuelos->count())  
      @foreach($vuelos as $vuelo) 
      <div class="offers_item rating_4">
        <div class="row"> 
            <div class="col-lg-1 temp_col"></div>
            <div class="col-lg-3 col-1680-4">
                <div class="offers_image_container">
                    <!-- Image by https://unsplash.com/@kensuarez -->
                    <div class="offers_image_background" style="background-image:url(imagenes/gallery_1.jpg)"></div>
                    <div class="offer_name"><a href="{{action('VueloController@show', $vuelo->id_vuelo)}}"> Vuela a {{$vuelo->id_aeropuerto_destino}}</a></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="offers_content">
                    <div class="offers_price">${{$vuelo->precio}}</div>
                    @if($vuelo->tipo_vuelo == 1)
                    <div class="offers_text">Tipo: Clase turista</div>
                    @else
                    <div class="oofers_text">Tipo: Primera clase</div>
                    @endif
                    <p class="offers_text">Aerolinea: {{$vuelo->aerolinea}}</p>
                    <p class="offers_text">Fecha ida: {{$vuelo->fecha_ida}}</p>
                    <p class="offers_text">Fecha vuelta: {{$vuelo->fecha_vuelta}}</p>
                    <p class="offers_text">Hora salida: {{$vuelo->hora_salida}}</p>
                    <div class="offers_icons">
                        <ul class="offers_icons_list">
                            <li class="offers_icons_item"><img src="imagenes/post.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/compass.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/bicycle.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/sailboat.png" alt=""></li>
                        </ul>
                    </div>
                    
                    @if(Auth::check())
                      @if(Auth::user()->tieneRol('admin'))
                        <div class="button book_button"><a href="{{action('VueloController@edit', $vuelo->id_vuelo)}}">Editar<span></span><span></span><span></span></a></div>
                      @endif
                    @endif

                    <!-- Botón Reservar si usuario ha iniciado sesión y es admin-->
                    <div class="button book_button"><a href="{{action('VueloController@show', $vuelo->id_vuelo)}}">Reservar<span></span><span></span><span></span></a></div>
                    
                    <div class="offer_reviews">

                        <!-- Botón Borrar si usuario ha iniciado sesión y es admin-->
                        @if(Auth::check())
                          @if(Auth::user()->tieneRol('admin'))
                            <form action="{{action('VueloController@destroy', $vuelo->id_vuelo)}}" method="post">
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
  {{ $vuelos->links() }}
</div>
@endsection

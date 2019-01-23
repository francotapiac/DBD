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

          <!-- Botón crear -->
          <a href="{{ route('actividad.create') }}" class="btn btn-info btn-lg" >Añadir Actividad</a>
      </ul>
  </div>
</div>

<div class="col-lg-12">
  <div class="offers_grid"  method="GET" action="/actividad">
    @if($actividades->count())  
      @foreach($actividades as $actividad) 
      <div class="offers_item rating_4">
        <div class="row"> 
            <div class="col-lg-1 temp_col"></div>
            <div class="col-lg-3 col-1680-4">
                <div class="offers_image_container">
                    <!-- Image by https://unsplash.com/@kensuarez -->
                    <div class="offers_image_background" style="background-image:url(imagenes/offer_1.jpg)"></div>
                    <div class="offer_name"><a href="{{action('ActividadController@show', $actividad->id_actividad)}}">{{$actividad->nombre}}</a></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="offers_content">
                    <div class="offers_price">${{$actividad->costo}}</div>
                    <p class="offers_text">{{$actividad->descripcion}}</p>
                    <div class="offers_icons">
                        <ul class="offers_icons_list">
                            <li class="offers_icons_item"><img src="imagenes/post.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/compass.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/bicycle.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/sailboat.png" alt=""></li>
                        </ul>
                    </div>

                    <!-- Botón editar -->
                    <div class="button book_button"><a href="{{action('ActividadController@edit', $actividad->id_actividad)}}">Editar<span></span><span></span><span></span></a></div>

                    <!-- Botón Reservar -->
                    <div class="button book_button"><a href="{{action('ActividadController@show', $actividad->id_actividad)}}">Reservar<span></span><span></span><span></span></a></div>
                    
                    <div class="offer_reviews">

                        <!-- Botón Borrar -->
                        <form action="{{action('ActividadController@destroy', $actividad->id_actividad)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger btn-lg" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
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
  {{ $actividades->links() }}
</div> 
@endsection
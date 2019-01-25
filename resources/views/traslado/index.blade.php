@extends('layouts.vistaControlador')
@section('content')

<div class="col-lg-11 ">
  <!-- Offers Sorting -->
  <div class="offers_sorting_container" style="margin-top: 200px">
      <ul class="offers_sorting">
          <!-- Botón crear -->
          <a href="{{ route('traslado.create') }}" class="btn btn-info btn-lg" >Añadir Traslado</a>
      </ul>
  </div>
</div>

<div class="col-lg-12">
  <div class="offers_grid"  method="GET" action="/traslado">
    @if($traslados->count())  
      @foreach($traslados as $traslado) 
      <div class="offers_item rating_4">
        <div class="row"> 
            <div class="col-lg-1 temp_col"></div>
            <div class="col-lg-3 col-1680-4">
                <div class="offers_image_container">
                    <!-- Image by https://unsplash.com/@kensuarez -->
                    <div class="offers_image_background" style="background-image:url(imagenes/traslado.jpg)"></div>
                    <div class="offer_name">
                      @if($traslado->tipo_traslado == 1)
                      <a href="{{action('TrasladoController@show', $traslado->id_traslado)}}">VIP</a></div>
                      @else
                      <a href="{{action('TrasladoController@show', $traslado->id_traslado)}}">Normal</a></div>
                      @endif               
                </div>
            </div>
            <div class="col-lg-8">
                <div class="offers_content">
                    <div class="offers_price">${{$traslado->precio}}</div>
                    <p class="offers_text">Compañia: {{$traslado->compania}}</p>
                    <p class="offers_text">Capacidad: {{$traslado->capacidad}}</p>
                    <p class="offers_text">*El precio es por persona</p>
                    <div class="offers_icons">
                        <ul class="offers_icons_list">
                            <li class="offers_icons_item"><img src="imagenes/post.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/compass.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/bicycle.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/sailboat.png" alt=""></li>
                        </ul>
                    </div>

                    <!-- Botón editar -->
                    <div class="button book_button"><a href="{{action('TrasladoController@edit', $traslado->id_traslado)}}">Editar<span></span><span></span><span></span></a></div>

                    <!-- Botón Reservar -->
                    <div class="button book_button"><a href="{{action('TrasladoController@show', $traslado->id_traslado)}}">Reservar<span></span><span></span><span></span></a></div>
                    
                    <div class="offer_reviews">

                        <!-- Botón Borrar -->
                        <form action="{{action('TrasladoController@destroy', $traslado->id_traslado)}}" method="post">
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
  {{ $traslados->links() }}
</div> 
@endsection
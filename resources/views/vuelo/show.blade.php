@extends('layouts.vistaControlador')
 @section('content')
 <div class="col-lg-12" style="margin-top: 200px">
  <div class="offers_grid"  method="GET" action="/vuelo">  
      <div class="offers_item rating_4">
        <div class="row"> 
            <div class="col-lg-1 temp_col"></div>
            <div class="col-lg-3 col-1680-4">
                <div class="offers_image_container">
                    <!-- Image by https://unsplash.com/@kensuarez -->
                    <div class="offers_image_background" style="background-image:url(imagenes/offer_1.jpg)"></div>
                    <div class="offer_name"><a href="{{action('VueloController@show', $vuelo->id_vuelo)}}">Vuela a {{$vuelo->id_aeropuerto_destino}}</a></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="offers_content">
                    <div class="offers_price">${{$vuelo->precio_diario}}</div>
                    <p class="offers_text">Fecha ida: {{$vuelo->fecha_ida}}</p>
                    <p class="offers_text">Fecha vuelta: {{$vuelo->fecha_vuelta}}</p>
                    <p class="offers_text">Nº de paradas: {{$vuelo->numero_paradas}}</p>
                    <p class="offers_text">Hora salida: {{$vuelo->hora_salida}}</p>
                    <p class="offers_text">Hora llegada: {{$vuelo->hora_llegada}}</p>
                    <p class="offers_text">Aerolinea: {{$vuelo->aerolinea}}</p>
                    <div class="offers_icons">
                        <ul class="offers_icons_list">
                            <li class="offers_icons_item"><img src="imagenes/post.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/compass.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/bicycle.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/sailboat.png" alt=""></li>
                        </ul>
                    </div>

                    <!-- Botón Reservar -
                    <div class="button book_button"><a href="{{action('VueloController@show', $vuelo->id_vuelo)}}">Reservar<span></span><span></span><span></span></a></div>-->
                    
			<form method="POST" action="{{ route('reservaVuelo') }}"  role="form">
				{{ csrf_field() }}
				<input type='hidden' name="id_vuelo" value = "{{$vuelo->id_vuelo}}" class="form-control" />
				<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
								</div>

			</form>


                </div>
            </div>
        </div>
      </div>
  </div>
</div> 
@endsection
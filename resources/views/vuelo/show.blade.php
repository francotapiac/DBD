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
                    <div class="offer_name"><a href="{{action('VueloController@show', $vuelo->id_vuelo)}}">Vuela a {{$aeropuerto->nombre_aeropuerto}}</a></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="offers_content">
                    <div class="offers_price">${{$vuelo->precio}}</div>
                    <p class="offers_text">Fecha ida: {{$vuelo->fecha_ida}}</p>
                    <p class="offers_text">Fecha vuelta: {{$vuelo->fecha_vuelta}}</p>
                    <p class="offers_text">Nº de paradas: {{$vuelo->numero_paradas}}</p>
                    <p class="offers_text">Hora salida: {{$vuelo->hora_salida}}</p>
                    <p class="offers_text">Hora llegada: {{$vuelo->hora_llegada}}</p>
                    <p class="offers_text">Aerolinea: {{$vuelo->aerolinea}}</p>
                    <p class="offers_text">Aeropuerto: {{$aeropuerto->nombre_aeropuerto}}</p>
                    <div class="offers_icons">
                        <ul class="offers_icons_list">
                            <li class="offers_icons_item"><img src="imagenes/post.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/compass.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/bicycle.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/sailboat.png" alt=""></li>
                        </ul>
                    </div>

                    
			<form method="POST" action="{{ route('agregarVuelo') }}"  role="form">
				{{ csrf_field() }}
				<input type='hidden' name="id" value = "{{$vuelo->id_vuelo}}" class="form-control" />
                <input type='hidden' name="aerolinea" value = "{{$vuelo->aerolinea}}" class="form-control" />
                <input type='hidden' name="cantidad" value = 1 class="form-control" />
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
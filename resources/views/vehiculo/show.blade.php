@extends('layouts.vistaControlador')
 @section('content')

<div class="col-lg-12" style="margin-top: 200px">
  <div class="offers_grid"  method="GET" action="/vehiculo">  
      <div class="offers_item rating_4">
        <div class="row"> 
            <div class="col-lg-1 temp_col"></div>
            <div class="col-lg-3 col-1680-4">
                <div class="offers_image_container">
                    <!-- Image by https://unsplash.com/@kensuarez -->
                    <div class="offers_image_background" style="background-image:url(imagenes/offer_1.jpg)"></div>
                    <div class="offer_name"><a href="{{action('VehiculoController@show', $vehiculo->id_vehiculo)}}">{{$vehiculo->nombre}}</a></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="offers_content">
                    <div class="offers_price">${{$vehiculo->precio_diario}}</div>
                    <p class="offers_text">Nombre: {{$vehiculo->nombre}}</p>
                    <p class="offers_text">Capacidad: {{$vehiculo->capacidad}}</p>
                    <p class="offers_text">Compañia: {{$vehiculo->compania}}</p>
                    <p class="offers_text">Precio diario: {{$vehiculo->precio_diario}}</p>
                    <div class="offers_icons">
                        <ul class="offers_icons_list">
                            <li class="offers_icons_item"><img src="imagenes/post.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/compass.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/bicycle.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/sailboat.png" alt=""></li>
                        </ul>
                    </div>

                    <!-- Botón Reservar -
                    <div class="button book_button"><a href="{{action('VehiculoController@show', $vehiculo->id_vehiculo)}}">Reservar<span></span><span></span><span></span></a></div>-->
                    
			<form method="POST" action="{{ route('reservaVehiculo') }}"  role="form">
				{{ csrf_field() }}
				<input type='hidden' name="id_vehiculo" value = "{{$vehiculo->id_vehiculo}}" class="form-control" />
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
				
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
                    <div class="offers_image_background" style="background-image:url(/imagenes/car.jpg)"></div>
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

                    <!-- Botón Reservar -
                    <div class="button book_button"><a href="{{action('VehiculoController@show', $vehiculo->id_vehiculo)}}">Reservar<span></span><span></span><span></span></a></div>-->
                    
			<form method="POST" action="{{ route('agregarVehiculo') }}"  role="form">
				{{ csrf_field() }}
				<input type='hidden' name="id" value = "{{$vehiculo->id_vehiculo}}" class="form-control" />
                <input type='hidden' name="nombre_vehiculo" value = "{{$vehiculo->nombre}}" class="form-control" />
                <input type='hidden' name="fecha_llegada" value = "0" class="form-control" />
                <input type='hidden' name="fecha_devolucion" value = "0" class="form-control" />
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
				
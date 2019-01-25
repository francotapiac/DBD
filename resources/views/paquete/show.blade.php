@extends('layouts.vistaControlador')
 @section('content')

<div class="col-lg-12" style="margin-top: 300px">
  <div class="offers_grid"  method="GET" action="/paquete">  
      <div class="offers_item rating_4">
        <div class="row"> 
            <div class="col-lg-1 temp_col"></div>
            <div class="col-lg-3 col-1680-4">
                <div class="offers_image_container">
                    <!-- Image by https://unsplash.com/@kensuarez -->
                    <div class="offers_image_background" style="background-image:url(/imagenes/gallery_4.jpg)"></div>
                    <div class="offer_name"><a href="{{action('PaqueteController@show', $paquete->id_paquete)}}">Paquete</a></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="offers_content">
                    <div class="offers_price">${{$paquete->precio_por_persona}}</div>
                    <p class="offers_text">Descripción: {{$paquete->descripcion}}</p>
                    <p class="offers_text">Descuento: {{$paquete->descuento}}</p>
                    <p class="offers_text">*El precio es por persona</p>
                    <div class="offers_icons">
                        <ul class="offers_icons_list">
                            <li class="offers_icons_item"><img src="imagenes/compass.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/compass.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/bicycle.png" alt=""></li>
                            <li class="offers_icons_item"><img src="imagenes/sailboat.png" alt=""></li>
                        </ul>
                    </div>

                    <!-- Botón Reservar -
                    <div class="button book_button"><a href="{{action('PaqueteController@show', $paquete->id_paquete)}}">Reservar<span></span><span></span><span></span></a></div>-->
            @if($paquete->id_paquete == 1)
            <form method="POST" action="{{ route('agregarPaquete1') }}"  role="form">
                {{ csrf_field() }}
                <input type='hidden' name="id" value = "{{$paquete->id_paquete}}" class="form-control" />
                <input type='hidden' name="nombre_paquete" value = "{{$paquete->nombre}}" class="form-control" />
                <input type='hidden' name="descuento" value = {{$paquete->descuento}} class="form-control" />
                <input type='hidden' name="fecha_devolucion" value = "0" class="form-control" />
                <input type='hidden' name="cantidad" value = 1 class="form-control" />

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <input type="submit"  value="Guardar" class="btn btn-success btn-block">
                </div>
            </form>
            @else
                <form method="POST" action="{{ route('agregarPaquete2') }}"  role="form">
                {{ csrf_field() }}
                <input type='hidden' name="id" value = "{{$paquete->id_paquete}}" class="form-control" />
                <input type='hidden' name="nombre_paquete" value = "{{$paquete->nombre}}" class="form-control" />
                <input type='hidden' name="descuento" value = {{$paquete->descuento}} class="form-control" />
                <input type='hidden' name="fecha_devolucion" value = "0" class="form-control" />
                <input type='hidden' name="cantidad" value = 1 class="form-control" />

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <input type="submit"  value="Guardar" class="btn btn-success btn-block">
                </div>
            </form>
            @endif
                </div>
            </div>
        </div>
      </div>
  </div>
</div> 
@endsection
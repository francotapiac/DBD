@extends('layouts.vistaControlador')
@section('content')

<div class="col-lg-12" style="margin-top: 200px">
  <div class="offers_grid"  method="GET" action="/asiento">  
      <div class="offers_item rating_4">
        <div class="row"> 
            <div class="col-lg-1 temp_col"></div>
            <div class="col-lg-3 col-1680-4">
                <div class="offers_image_container">
                    <!-- Image by https://unsplash.com/@kensuarez -->
                    <div class="offers_image_background" style="background-image:url(/imagenes/asiento.jpg)"></div>
                    <div class="offer_name"><a href="{{action('AsientoController@show', $asiento->id_asiento)}}">Asiento {{$asiento->numero_asiento}} {{$asiento->letra_asiento}}</a></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="offers_content">
                    <div class="offers_text">Ubicación: {{$asiento->numero_asiento}} {{$asiento->letra_asiento}}</div>
                      @if($asiento->tipo_asiento == 1)
                      <div class="offers_text">Tipo asiento: Premium</div>
                      @else
                      <div class="offers_text">Tipo asiento: Económico</div>
                      @endif     
                    
      <form method="POST" action="{{ route('agregarVuelo') }}"  role="form">
        {{ csrf_field() }}
                <input type='hidden' name="id" value = "{{$asiento->id_asiento}}" class="form-control" />
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
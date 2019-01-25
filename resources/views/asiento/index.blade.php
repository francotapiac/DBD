@extends('layouts.vistaControlador')
@section('content')

<div class="col-lg-11 ">
  <!-- Offers Sorting -->
  <div class="offers_sorting_container" style="margin-top: 200px">
      <ul class="offers_sorting">
          <!-- Botón crear -->
          @if(Auth::check())
            @if(Auth::user()->tieneRol('admin'))
              <a href="{{ route('asiento.create') }}" class="btn btn-info btn-lg" >Añadir asiento</a>
            @endif
          @endif
      </ul>
  </div>
</div>

<div class="col-lg-12">
  <div class="offers_grid"  method="GET" action="/asiento">
    @if($asientos->count())  
      @foreach($asientos as $asiento) 
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

                    <!-- Botón editar -->
                    @if(Auth::check())
                      @if(Auth::user()->tieneRol('admin'))
                        <div class="button book_button"><a href="{{action('AsientoController@edit', $asiento->id_asiento)}}">Editar<span></span><span></span><span></span></a></div>
                      @endif
                    @endif

                    <!-- Botón Reservar -->
                    <div class="button book_button"><a href="{{action('AsientoController@show', $asiento->id_asiento)}}">Reservar<span></span><span></span><span></span></a></div>
                    
                    <div class="offer_reviews">

                        <!-- Botón Borrar -->
                        @if(Auth::check())
                          @if(Auth::user()->tieneRol('admin'))
                            <form action="{{action('AsientoController@destroy', $asiento->id_asiento)}}" method="post">
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
  {{ $asientos->links() }}
</div> 
@endsection
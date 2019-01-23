@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
 
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar vuelo</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('vuelo.update',$vuelo->id_vuelo) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							

							<div class="form-group">Fecha ida
								<input type="date" name="fecha_ida" id="fecha_ida" class="form-control input-sm" value="{{$vuelo->fecha_ida}}" placeholder="Fecha ida">
							</div>
 
							<div class="form-group">Fecha vuelta
								<input type="date" name="fecha_vuelta" id="fecha_vuelta" class="form-control input-sm" value="{{$vuelo->fecha_vuelta}}" placeholder="Fecha vuelta">
							</div>
							<div class="form-group">Hora salida
								<input type="text" name="hora_salida" id="hora_salida" class="form-control input-sm" value="{{$vuelo->hora_salida}}" placeholder="Hora salida">
							</div>
							<div class="form-group">Hora llegada
								<input type="text" name="hora_llegada" id="hora_llegada" class="form-control input-sm" value="{{$vuelo->hora_llegada}}" placeholder="Hora llegada">
							</div>
							<div class="form-group">Duración vuelo
								<input type="number" name="duracion_vuelo" id="duracion_vuelo" class="form-control input-sm" placeholder="Duración vuelo" value="{{$vuelo->duracion_vuelo}}">
							</div>
							<div class="form-group">Precio
								<input type="number" name="precio" id="precio" class="form-control input-sm" placeholder="Precio del vuelo" value="{{$vuelo->precio}}">
							</div>
							<div class="form-group">Número de paradas
								<input type="number" name="numero_paradas" id="numero_paradas" class="form-control input-sm" placeholder="Número de paradas" value="{{$vuelo->numero_paradas}}">
							</div>	
							<div class="form-group">Tipo de vuelo
								<input type="number" name="tipo_vuelo" id="tipo_vuelo" class="form-control input-sm" placeholder="Tipo de vuelo" value="{{$vuelo->tipo_vuelo}}">
							</div>
							<div class="form-group">Equipaje
								<input type="number" name="equipaje" id="equipaje" class="form-control input-sm" placeholder="Equipaje" value="{{$vuelo->equipaje}}">
							</div>	
							<div class="form-group">Disponibilidad
								<input type="boolean" name="disponibilidad" id="disponibilidad" class="form-control input-sm" placeholder="Disponibilidad" value="{{$vuelo->disponibilidad}}">
							</div>
							<div class="form-group">Aerolinea
								<input type="text" name="aerolinea" id="aerolinea" class="form-control input-sm" placeholder="Aerolinea" value="{{$vuelo->aerolinea}}">
							</div>	
							<div class="form-group">Aeropuerto Origen
								<input type="number" name="id_aeropuerto_origen" id="id_aeropuerto_origen" class="form-control input-sm" placeholder="Aeropuerto origen" value="{{$vuelo->id_aeropuerto_origen}}">
							</div>
							<div class="form-group">Aeropuerto Destino
								<input type="number" name="id_aeropuerto_destino" id="id_aeropuerto_destino" class="form-control input-sm" placeholder="Aeropuerto destino" value="{{$vuelo->id_aeropuerto_destino}}">
							</div>
							<br>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('vuelo.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection
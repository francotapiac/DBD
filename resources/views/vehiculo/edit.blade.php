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
					<h3 class="panel-title">Editar vehiculo</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('vehiculo.update',$vehiculo->id_vehiculo) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										Nombre
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" value="{{$vehiculo->nombre}}" placeholder="Nombre de la vehiculo">
									</div>
								</div>
							</div>
 
							<div class="form-group">Compañia
									<input type="text" name="compania" id="compania" class="form-control input-sm" value="{{$vehiculo->compania}}" placeholder="Compañia">
									</div>
							<div class="form-group">Capacidad
									<input type="number" name="capacidad" id="capacidad" class="form-control input-sm" value="{{$vehiculo->capacidad}}" placeholder="Capacidad">
									</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">Precio diario
										<input type="number" name="precio_diario" id="precio_diario" class="form-control input-sm" placeholder="Precio diario del vehiculo" value="{{$vehiculo->precio_diario}}">
									</div>
								</div>
							</div>
								<div class="form-group">Fecha recogida
										<input type="date" name="fecha_recogida" id="fecha_recogida" class="form-control input-sm" placeholder="Fecha recogida del vehiculo" value="{{$vehiculo->fecha_recogida}}">
									</div>
							<div class="form-group">Fecha devolución
										<input type="date" name="fecha_devolucion" id="fecha_devolucion" class="form-control input-sm" placeholder="Fecha devolucion del vehiculo" value="{{$vehiculo->fecha_devolucion}}">
									</div>
									Disponibilidad
							<input type="boolean" name="disponibilidad" id="disponibilidad" class="form-control input-sm" placeholder="Disponibilidad del vehiculo" value="{{$vehiculo->disponibilidad}}">
									</div>
									Lugar
									<input type="number" name="id_lugar" id="id_lugar" class="form-control input-sm" placeholder="Lugar del vehiculo" value="{{$vehiculo->id_lugar}}">
									</div>


							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('vehiculo.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection
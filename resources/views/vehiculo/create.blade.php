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
					<h3 class="panel-title">Nuevo vehículo</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('vehiculo.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">Nombre del vehículo
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del vehiculo">
									</div>
									<div class="form-group">Compañia
										<input type="text" name="compania" id="compania" class="form-control input-sm" placeholder="Compañia">
									</div>
									<div class="form-group">Capacidad
										<input type="number" name="capacidad" id="capacidad" class="form-control input-sm" placeholder="Capacidad">
									</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">Precio diario
										<input type="number" name="precio_diario" id="precio_diario" class="form-control input-sm" placeholder="Precio diario del vehiculo">
									</div>
								</div>
							</div>
								<div class="form-group">Fecha recogida
									<input type="date" name="fecha_recogida" id="fecha_recogida" class="form-control input-sm" placeholder="Fecha recogida del vehiculo">
								</div>
								<div class="form-group">Fecha devolución
									<input type="date" name="fecha_devolucion" id="fecha_devolucion" class="form-control input-sm" placeholder="Fecha devolucion del vehiculo">
								</div>
							<div class="form-group">Disponibilidad
							<input type="boolean" name="disponibilidad" id="disponibilidad" class="form-control input-sm" placeholder="Disponibilidad del vehiculo">
									</div>
							<div class="form-group">Lugar
									<input type="number" name="id_lugar" id="id_lugar" class="form-control input-sm" placeholder="Lugar del vehiculo">
							</div>
					
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
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
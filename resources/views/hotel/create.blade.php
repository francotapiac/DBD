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
					<h3 class="panel-title">Nuevo Hotel</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('hotel.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">Nombre del hotel
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del hotel">
									</div>
									<div class="form-group">Teléfono del hotel
										<input type="text" name="telefono" id="telefono" class="form-control input-sm" placeholder="Teléfono del hotel">
									</div>
									<div class="form-group">Compañía del hotel
										<input type="text" name="compania" id="compania" class="form-control input-sm" placeholder="Compañía del hotel">
									</div>
									<div class="form-group">Calificación del hotel
										<input type="number" name="calificacion" id="calificacion" class="form-control input-sm" placeholder="Calificación del hotel">
									</div>
									<div class="form-group">Descripción del hotel
										<input type="text" name="descripcion" id="descripcion" class="form-control input-sm" placeholder="Descripción del hotel">
									</div>
					
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('hotel.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection
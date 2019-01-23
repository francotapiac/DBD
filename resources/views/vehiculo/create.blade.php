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
					<h3 class="panel-title">Nuevo vehiculo</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('vehiculo.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre de la vehiculo">
									</div>
								<div class="form-group">
									<label for="">Pais de la vehiculo</label>
									<select name="pais" id="pais" class="form-control">
										@foreach($lugars as $lugar)
											<option value="{{$lugar['id_lugar']}}">{{$lugar['pais']}}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group">
									<label for="">Ciudad de la vehiculo</label>
									<select name="ciudad" id="ciudad" class="form-control">
										@foreach($lugars as $lugar)
											<option value="{{$lugar['id_lugar']}}">{{$lugar['ciudad']}}</option>
										@endforeach
									</select>
								</div>
 
								<div class="form-group">
									<textarea name="descripcion" class="form-control input-sm" placeholder="Descripción"></textarea>
								</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="number" name="costo" id="costo" class="form-control input-sm" placeholder="Costo de la vehiculo">
									</div>
								</div>
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
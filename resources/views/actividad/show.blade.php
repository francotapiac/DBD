<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">{{$actividad->nombre}}</h3>
	</div>
	<div class="panel-body">					
		<div class="table-container">
			<form method="POST" action="{{ route('reservaActividad') }}"  role="form">
				{{ csrf_field() }}
				<input type='hidden' name="id_actividad" value = "{{$actividad->id_actividad}}" class="form-control" />
				<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
								</div>

			</form>
		</div>
	</div>
</div>
				
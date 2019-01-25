@extends('layouts.vistaControlador')

@section('content')


<div class="background" style="margin-top: 200px">
	<div><p><br/><br/><br/><br/></p></div>
    <div class="container text-center">
        <div class="page-header">
            <h1>Reservas</h1>
            <div><p><br/></p></div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" align="center">Tipo de reserva</th>
                    <th scope="col" align="center">Fecha de reserva</th>
                    <th scope="col" align="center">Hora reserva</th>
                    <th scope="col" align="center">Especificación</th>
                    <th scope="col" align="center">Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                    @if(!is_null($reserva->actividads->first()))
                        <tr>
                            <td>actividad</td>
                            <td>{{$reserva->fecha_reserva}}</td>
                            <td>{{$reserva->hora_reserva }}</td>
                            <td>{{$reserva->detalle_reserva}}</td>
                            <td>{{$reserva->pago_actual}}</td>
                    @endif   
                         </tr>
                    @if(!is_null($reserva->habitacions->first()))
                        <tr>
                            <td>Hotel</td>
                            <td>{{$reserva->fecha_reserva}}</td>
                            <td>{{$reserva->hora_reserva }}</td>
                            <td>{{$reserva->detalle_reserva}}</td>
                            <td>{{$reserva->pago_actual}}</td>
                           
                         </tr>
                    @endif

                    @if(!is_null($reserva->vehiculos->first()))
                        <tr>
                            <td>Vehiculo</td>
                            <td>{{$reserva->fecha_reserva}}</td>
                            <td>{{$reserva->hora_reserva }}</td>
                            <td>{{$reserva->detalle_reserva}}</td>
                            <td>{{$reserva->pago_actual}}</td>
                           
                         </tr>
                    @endif

                    @if(!is_null($reserva->vuelos->first()))
                        <tr>
                            <td>Vehiculo</td>
                            <td>{{$reserva->fecha_reserva}}</td>
                            <td>{{$reserva->hora_reserva }}</td>
                            <td>{{$reserva->detalle_reserva}}</td>
                            <td>{{$reserva->pago_actual}}</td>
                         </tr>
                    @endif

                    @if(!is_null($reserva->paquetes->first()))
                        <tr>
                            <td>Vehiculo</td>
                            <td>{{$reserva->fecha_reserva}}</td>
                            <td>{{$reserva->hora_reserva }}</td>
                            <td>{{$reserva->detalle_reserva}}</td>
                            <td>{{$reserva->pago_actual}}</td>
                         </tr>
                    @else
                        <td colspan="8">No hay registro !!</td>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
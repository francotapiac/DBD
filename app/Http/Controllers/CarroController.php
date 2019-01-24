<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Reserva;
use App\Actividad;
use App\Habitacion;
use App\Vehiculo;
use App\Vuelo;
use App\Traslado;
use App\Usuario;
use Illuminate\Support\Facades\Auth;
use Validator;

class CarroController extends Controller
{

    //Función que crea el carro en caso de no existir
    //Se utiliza formato json
    public function crearCarro(){
        $carro = null;
        if(Session::has("carro")){
            $carro = json_decode(Session::get("carro"));
        }
        else{
            $carro = new \stdClass(); //Clase vacía
            $carro->servicios = [];   //Atributos asignados en esta clase
            $carro->total = 0;
        }
        return $carro;

    }

    //Función encargada de mostrar el carro en vista carroCompra.blade
    public function mostrarCarro(){

        $carro = $this->crearCarro();
        return view('usuario.carroCompra',compact("carro"));

    }

    //Función que borra elementos del carro
    public function borrarElementos(Request $request){

        $indice = $request->input('indice');
        if (Session::has("carro")){
            $carro = json_decode(Session::get("carro"));
            $servicios = $carro->servicios;
            $carro->total = $carro->total - $carro->servicios[$indice]->subtotal;
            array_splice($carro->servicios, $indice, 1);
            Session::put("carro", json_encode($carro));
            return view('usuario.carroCompra',compact("carro"));
        }
    }

    //Función encargada de agregar una actividad en carro
    public function agregarActividad(Request $request){

        $carro = $this->crearCarro();

        $id = $request->input("id");
        $nombreActividad = $request->input("nombre");
        $cantidad = $request->input("cantidad");

        $actividad = Actividad::findOrFail($id);

        $reservaActividad = new \stdClass();
        $reservaActividad->id = $id;
        $reservaActividad->categoria = 'Actividad';
        $reservaActividad->subcategoria = 'Reservas';
        $reservaActividad->precio = $actividad->costo;
        $reservaActividad->nombre = $nombreActividad;
        $reservaActividad->cantidad = $cantidad;
        $reservaActividad->subtotal= $reservaActividad->precio * $cantidad;
        array_push($carro->servicios, $reservaActividad);
        $total = 0;
        foreach ($carro->servicios as $item) {
            $total = $total + $item->subtotal;
        }
        $carro->total = $total;
        Session::put("carro", json_encode($carro));
        return $this->mostrarCarro();
    }

    public function agregarHabitacion(Request $request){

        $carro = $this->crearCarro();

        $id = $request->input("id");
        $nombre_vehiculo = $request->input("nombre_hotel");
        $fecha_llegada = $request->input("fecha_llegada");
        $fecha_salida = $request->input("fecha_salida");
        $cantidad = $request->input("cantidad");

        $habitacion = Habitacion::findOrFail($id);

        $reservaHabitacion = new \stdClass();
        $reservaHabitacion->id = $id;
        $reservaHabitacion->categoria = 'Habitacion';
        $reservaHabitacion->subcategoria = 'Reservas';
        $reservaHabitacion->precio = $habitacion->precio_noche;
        $reservaHabitacion->nombre = $nombre_vehiculo;
        $reservaHabitacion->fecha_llegada = $fecha_llegada;
        $reservaHabitacion->fecha_salida = $fecha_salida;
        $reservaHabitacion->cantidad = $cantidad;
        $reservaHabitacion->subtotal= $reservaHabitacion->precio * $cantidad;
        array_push($carro->servicios, $reservaHabitacion);
        $total = 0;
        foreach ($carro->servicios as $item) {
            $total = $total + $item->subtotal;
        }
        $carro->total = $total;
        Session::put("carro", json_encode($carro));
        return $this->mostrarCarro();
    }

     public function agregarVehiculo(Request $request){

        $carro = $this->crearCarro();

        $id = $request->input("id");
        $nombreVehiculo = $request->input("nombre_vehiculo");
        $fechaRecogida = $request->input("fecha_llegada");
        $fechaDevolucion = $request->input("fecha_devolucion");
        $cantidad = $request->input("cantidad");

        $vehiculo = Vehiculo::findOrFail($id);

        $reservaVehiculo = new \stdClass();
        $reservaVehiculo->id = $id;
        $reservaVehiculo->categoria = 'Vehiculo';
        $reservaVehiculo->subcategoria = 'Reservas';
        $reservaVehiculo->precio = $vehiculo->precio_diario;
        $reservaVehiculo->nombre = $nombreVehiculo;
        $reservaVehiculo->fecha_llegada = $fechaRecogida;
        $reservaVehiculo->fecha_salida = $fechaDevolucion;
        $reservaVehiculo->cantidad = $cantidad;
        $reservaVehiculo->subtotal= $reservaVehiculo->precio * $cantidad;
        array_push($carro->servicios, $reservaVehiculo);
        $total = 0;
        foreach ($carro->servicios as $item) {
            $total = $total + $item->subtotal;
        }
        $carro->total = $total;
        Session::put("carro", json_encode($carro));
        return $this->mostrarCarro();
    }

    public function agregarVuelo(Request $request){

        $carro = $this->crearCarro();

        $id = $request->input("id");
        $aerolinea = $request->input("aerolinea");
        $cantidad = $request->input("cantidad");

        $vuelo = Vuelo::findOrFail($id);
        
        $reservaVuelo = new \stdClass();
        $reservaVuelo->id = $id;
        $reservaVuelo->categoria = 'Vuelo';
        $reservaVuelo->subcategoria = 'Reservas';
        $reservaVuelo->precio = $vuelo->precio_diario;
        $reservaVuelo->nombre = $aerolinea;
        $reservaVuelo->cantidad = $cantidad;
        $reservaVuelo->subtotal= $reservaVuelo->precio * $cantidad;
        array_push($carro->servicios, $reservaVuelo);
        $total = 0;
        foreach ($carro->servicios as $item) {
            $total = $total + $item->subtotal;
        }
        $carro->total = $total;
        Session::put("carro", json_encode($carro));
        return $this->mostrarCarro();
    }

    
    /*public function agregarTraslado(Request $request){

        $carro = $this->crearCarro();

        $id = $request->input("id");
        $capacidad = $request->input("capacidad")
        $fecha_traslado = $request->input("fecha_traslado");
        $cantidad = $request->input("cantidad");    

        $traslado = Traslado::findOrFail($id);

        $reservaTraslado = new \stdClass();
        $reservaTraslado->id = $id;
        $reservaTraslado->categoria = 'Habitacion';
        $reservaTraslado->subcategoria = 'Reservas';
        $reservaTraslado->precio = $traslado->precio;
        $reservaTraslado->nombre = $traslado->compania;
        $reservaTraslado->cantidad = $cantidad;
        $reservaTraslado->subtotal= $reservaTraslado->precio * $cantidad;
        array_push($carro->servicios, $reservaTraslado);
        $total = 0;
        foreach ($carro->servicios as $item) {
            $total = $total + $item->subtotal;
        }
        $carro->total = $total;
        Session::put("carro", json_encode($carro));
        return $this->mostrarCarro();
    }
*/


	/*//Crear variable de sesión carrito
    //Permite que sea disponible en cuaquier lado del sitio
    /*public function _construct(){
    	if(!\Session::has('carroCompra')) \Session::put('carroCompra',array());
    }

    //Mostar datos de carrito
    public function show(){
    	return \Session::get('carroCompra');
    }

    public function add(Reserva $reserva){
    	$carrito =  \Session::get('carroCompra');
        $carrito[$reserva->id_reserva] = $reserva;
        \Session::put('carroCompra',$carrito);
        return redirect()->route('carritos.show');
    }

    public function carroCompra(Request $request){

        //Reserva realizada por usuario
        $reserva = Reserva::where([
            ['id_usuario', Auth::user()->id]
        ])->first();

        $reserva_actividad = $reserva->actividads;
        return view('usuario.carroCompra', ['actividads' => $reserva_actividad,
            'usuarios' => $request->user()]);
    }

    public function borrarElementos(Request $request){

         $tipo = $request->tipo;
         $reserva = Reserva::where([
            ['id_usuario', Auth::user()->id],
            //['reserva_realizada', false],
        ])->first();

         if($tipo == 'actividad'){
            $reserva->actividads()->detach($request->id_actividad);
            return redirect('carrito')->with('status','Actividad removida');
         }


    }*/

}

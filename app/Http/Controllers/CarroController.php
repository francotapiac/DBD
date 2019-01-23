<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Reserva;
use App\Actividad;
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
        $actividads = Actividad::all();
        return view('usuario.carroCompra',compact("carro","actividads"));

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

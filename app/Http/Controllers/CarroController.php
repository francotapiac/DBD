<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use App\Actividad;
use App\Usuario;
use Illuminate\Support\Facades\Auth;
use Validator;

class CarroController extends Controller
{
	//Crear variable de sesión carrito
    //Permite que sea disponible en cuaquier lado del sitio
    public function _construct(){
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

    public function agregarArregloReservas(Request $request){
        
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarroController extends Controller
{
	//Crear variable de sesión carrito
    public function _construct(){
    	if(!\Session::has('carrito')) \Session::put('carrito',array());
    }

    //Mostar datos de carrito
    public function show(){
    	return \Session::get('carrito');
    }

    public function agregarItem(){
    	
    }
}

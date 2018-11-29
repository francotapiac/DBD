<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    //Se autoriza a usuarios de acuerdo a roles (agregar más roles acá)
     $request->user()->autorizarRoles(['usuario', 'admin']);   
        return view('home');
    }

    /*public function algunasCosasDeAdministrador(Request $request){

        $request->user()->autorizarRoles('adimn');
        return view('algunas.view');
    }*/
}

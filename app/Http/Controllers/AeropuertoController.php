<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aeropuerto;

class AeropuertoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Se recibe lo buscado en vista
        $nombre = $request->get('nombre_aeropuerto');
        $tipo = $request->get('tipo_aeropuerto');
        $numero = $request->get('numero_contacto');

        $aeropuertos = Aeropuerto::All();
        /*$aeropuertos = Aeropuerto::orderBy('id_aeropuerto','DESC')
        ->nombre($nombre)               //Se realiza query scope desde el modelo (con función scopeNombre)
        ->tipo($tipo)
        ->numero($numero)
        ->paginate(7); 
        return view('aeropuerto.index',compact('aeropuertos'));*/
        return $aeropuertos; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aeropuertos = Aeropuerto::create($request->all());
        $aeropuertos->save();
        return response()->json($aeropuertos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aeropuertos = Aeropuerto::find($id);
        return $aeropuertos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return Aeropuerto::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aeropuertos = Aeropuerto::find($id)->delete();
        return response()->json("Eliminado exitosamente");
    }
}

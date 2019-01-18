<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aeropuerto;
use Validator;

class AeropuertoController extends Controller
{
    public function rules(){
        return [
        'nombre_aeropuerto' => 'required|string',
        'tipo_aeropuerto' => 'required|numeric', 
        'numero_contacto' => 'required|string',
        'id_lugar' => 'required|numeric'
        ];
    }

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
        $lugar = $request->get('lugar');

        $aeropuertos = Aeropuerto::orderBy('id_aeropuerto','DESC')
        ->nombre($nombre)               //Se realiza query scope desde el modelo (con función scopeNombre)
        ->tipo($tipo)
        ->numero($numero)
        ->lugar($lugar)
        ->paginate(7); 
        return view('aeropuerto.index',compact('aeropuertos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('aeropuerto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
                        $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        
        $aeropuerto = new Aeropuerto();
        $aeropuerto->nombre_aeropuerto = $request->get('nombre_aeropuerto');
        $aeropuerto->tipo_aeropuerto = $request->get('tipo_aeropuerto') == 1;
        $aeropuerto->numero_contacto = $request->get('numero_contacto');
        try{
            $id = $request->get('id_lugar');
            $lugar = \App\Lugar::find($id);
            $aeropuerto->id_lugar = $id;
            $aeropuerto->save();
            return redirect()->route('aeropuerto.index')->with('success','Registro creado satisfactoriamente');
        }
        catch(\Exception $e){
            return 'Todo esta malo';
        }

        
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
        return  view('aeropuerto.show',compact('aeropuertos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aeropuerto = Aeropuerto::find($id);
        return view('aeropuerto.edit',compact('aeropuerto'));
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
        $validator = Validator::make($request->all(),
                        $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        
        $aeropuerto = Aeropuerto::find($id);
        $aeropuerto->nombre_aeropuerto = $request->get('nombre_aeropuerto');
        $aeropuerto->tipo_aeropuerto = $request->get('tipo_aeropuerto');
        $aeropuerto->numero_contacto = $request->get('numero_contacto');
        try{
            $id = $request->get('id_lugar');
            $lugar = \App\Lugar::find($id);
            $aeropuerto->id_lugar = $id;
            $aeropuerto->save();
            return redirect()->route('aeropuerto.index')->with('success','Registro actualizado satisfactoriamente');
        }
        catch(\Exception $e){
            return 'Todo esta malo';
        }
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
        return redirect()->route('aeropuerto.index')->with('success','Registro eliminado satisfactoriamente');
    }
}

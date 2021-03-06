<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vuelo;
use Validator;
use App\Lugar;
use App\Aeropuerto;
use App\Asiento;


class VueloController extends Controller
{
    public function rules(){
        return [
        'fecha_ida' => 'required|date',
        'fecha_vuelta' => 'required|date', 
        'hora_salida' => 'required|string',
        'hora_llegada' => 'required|string',
        'duracion_vuelo' => 'required|numeric',
        'precio' => 'required|numeric', 
        'numero_paradas' => 'required|numeric',
        'tipo_vuelo' => 'required|numeric',
        'equipaje' => 'required|numeric', 
        'disponibilidad' => 'required|boolean', 
        'aerolinea' => 'required|string', 
        'id_aeropuerto_origen' => 'required|numeric', 
        'id_aeropuerto_destino' => 'required|numeric',
        'ciudad_origen' => 'required|string', 
        'pais_origen' => 'required|string', 
        'ciudad_destino' => 'required|string', 
        'pais_destino' => 'required|string', 

        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$vuelos = Vuelo::all();
        //return $vuelos;
        $ciudadOrigen = $request->get('origen');
        $ciudadDestino = $request->get('destino');
        $fecha_ida = $request->get('fecha_ida');
        $fecha_regreso = $request->get('fecha_regreso');
        $vuelos = Vuelo::orderBy('id_vuelo','DESC')
        ->lugar($ciudadOrigen,$ciudadDestino)
        ->fecha($fecha_ida,$fecha_regreso)
        ->paginate(3); 
        return view('vuelo.index',compact('vuelos')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return $this->store($request);
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
        
        $vuelo = new Vuelo();
        $vuelo->fecha_ida = $request->get('fecha_ida');
        $vuelo->fecha_vuelta = $request->get('fecha_vuelta');
        $vuelo->hora_salida = $request->get('hora_salida');
        $vuelo->hora_llegada = $request->get('hora_llegada');
        $vuelo->duracion_vuelo = $request->get('duracion_vuelo');
        $vuelo->precio = $request->get('precio');
        $vuelo->numero_paradas = $request->get('numero_paradas');
        $vuelo->tipo_vuelo = $request->get('tipo_vuelo') ;
        $vuelo->equipaje = $request->get('equipaje');
        $vuelo->disponibilidad = $request->get('disponibilidad');
        $vuelo->aerolinea = $request->get('aerolinea');
        $vuelo->tipo_vuelo = $request->get('ciudad_origen') ;
        $vuelo->equipaje = $request->get('pais_origen');
        $vuelo->disponibilidad = $request->get('ciudad_destino');
        $vuelo->aerolinea = $request->get('pais_destino');
        try{
            $id = $request->get('id_aeropuerto_origen');
            $aeropuerto = \App\Aeropuerto::find($id);
            $vuelo->id_aeropuerto_origen = $id;

            $id = $request->get('id_aeropuerto_destino');
            $aeropuerto = \App\Aeropuerto::find($id);
            $vuelo->id_aeropuerto_destino = $id;

            $vuelo->save();
            return $vuelo;
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
        /*$vuelo = Vuelo::find($id);
        return $vuelo;*/
        $vuelo = Vuelo::find($id);
        $asientos = Asiento::where('id_vuelo',$id)
        ->where('disponibilidad',true)->paginate(3); ;
        return view('asiento.index',compact('asientos','vuelo'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vuelo = Vuelo::find($id);
        return view('vuelo.edit',compact('vuelo'));
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
        
        $vuelo = new Vuelo();
        $vuelo->fecha_ida = $request->get('fecha_ida');
        $vuelo->fecha_vuelta = $request->get('fecha_vuelta');
        $vuelo->hora_salida = $request->get('hora_salida');
        $vuelo->hora_llegada = $request->get('hora_llegada');
        $vuelo->duracion_vuelo = $request->get('duracion_vuelo');
        $vuelo->precio = $request->get('precio');
        $vuelo->numero_paradas = $request->get('numero_paradas');
        $vuelo->tipo_vuelo = $request->get('tipo_vuelo') ;
        $vuelo->equipaje = $request->get('equipaje');
        $vuelo->disponibilidad = $request->get('disponibilidad');
        $vuelo->aerolinea = $request->get('aerolinea');
        $vuelo->tipo_vuelo = $request->get('ciudad_origen') ;
        $vuelo->equipaje = $request->get('pais_origen');
        $vuelo->disponibilidad = $request->get('ciudad_destino');
        $vuelo->aerolinea = $request->get('pais_destino');
        try{
            $id = $request->get('id_aeropuerto_origen');
            $aeropuerto = \App\Aeropuerto::find($id);
            $vuelo->id_aeropuerto_origen = $id;

            $id = $request->get('id_aeropuerto_destino');
            $aeropuerto = \App\Aeropuerto::find($id);
            $vuelo->id_aeropuerto_destino = $id;

            $vuelo->save();
            //return $vuelo;
            return redirect()->route('vuelo.index')->with('success','Registro actualizado satisfactoriamente');
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
        $vuelo = Vuelo::find($id)->delete();
        return response()->json("Eliminado exitosamente");
    }

}

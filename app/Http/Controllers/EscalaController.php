<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escala;
use Validator;

class EscalaController extends Controller
{
    public function rules(){
        return [
        'cambio_avion' => 'required|numeric',
        'cambio_aeropuerto' => 'required|numeric', 
        'duracion_escala' => 'required|numeric',
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
        $cambio_avion = $request->get('cambio_avion');
        $cambio_aeropuerto = $request->get('cambio_aeropuerto');
        $duracion_escala = $request->get('duracion_escala');
        $lugar = $request->get('lugar');

        $escalas = Escala::orderBy('id_escala','DESC')
        ->cambioAvion($cambio_avion)               //Se realiza query scope desde el modelo (con función scopeNombre)
        ->cambioAeropuerto($cambio_aeropuerto)
        ->duracionEscala($duracion_escala)
        ->lugar($lugar)
        ->paginate(3); 
        
        return view('escala.index',compact('escalas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('escala.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $escala = new Escala();
        $escala->cambio_avion = $request->get('cambio_avion');
        $escala->cambio_aeropuerto = $request->get('cambio_aeropuerto');
        $escala->duracion_escala = $request->get('duracion_escala');
         try{
            $id = $request->get('id_lugar');
            $lugar = \App\Lugar::find($id);
            $escala->id_lugar = $id;
            $escala->save();
            return redirect()->route('escala.index')->with('success','Registro creado satisfactoriamente');
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
        $escala = Escala::find($id);
        return  view('escala.show',compact('escala'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $escala = Escala::find($id);
        return view('escala.edit',compact('escala'));
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
        $escala = Escala::find($id);
        $escala->cambio_avion = $request->get('cambio_avion');
        $escala->cambio_aeropuerto = $request->get('cambio_aeropuerto');
        $escala->duracion_escala = $request->get('duracion_escala');
         try{
            $id = $request->get('id_lugar');
            $lugar = \App\Lugar::find($id);
            $escala->id_lugar = $id;
            $escala->save();
            return redirect()->route('escala.index')->with('success','Registro actualizado satisfactoriamente');
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
        $escala = Escala::find($id)->delete();
        return redirect()->route('escala.index')->with('success','Registro eliminado satisfactoriamente');
    }
}

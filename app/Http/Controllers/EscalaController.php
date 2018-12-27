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
    public function index()
    {
        $escala = Escala::all();
        return $escala;
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
        $escala = new Escala();
        $escala->cambio_avion = $request->get('cambio_avion');
        $escala->cambio_aeropuerto = $request->get('cambio_aeropuerto');
        $escala->duracion_escala = $request->get('duracion_escala');
         try{
            $id = $request->get('id_lugar');
            $lugar = \App\Lugar::find($id);
            $escala->id_lugar = $id;
            $escala->save();
            return $escala;
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
        return $escala;
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
        $escala = Escala::find($id);
        $escala->cambio_avion = $request->get('cambio_avion');
        $escala->cambio_aeropuerto = $request->get('cambio_aeropuerto');
        $escala->duracion_escala = $request->get('duracion_escala');
         try{
            $id = $request->get('id_lugar');
            $lugar = \App\Lugar::find($id);
            $escala->id_lugar = $id;
            $escala->save();
            return $escala;
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
        return response()->json("Eliminado exitosamente");
    }
}

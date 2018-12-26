<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historial;
use Validator;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function rules(){
        return
        [
            'descripcion' => 'required|string',
            'accion' => 'required|string',
            'fecha_accion' => 'required|string',
            'hora_accion' => 'required|string',
        ];
    }

    public function index()
    {
        $historial = Historial::all();
        return $historial;
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
        /*$historial = Historial::create($request->all());
        $historial->save();
        return response()->json($historial);*/
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $historial = new \App\Historial;
        $historial->descripcion=$request->get('descripcion');
        $historial->accion= $request->get('accion');
        $historial->fecha_accion=$request->get('fecha_accion');
        $historial->hora_accion=$request->get('hora_accion');
        $historial->save();
        return $historial;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historial = Historial::find($id);
        return $historial;
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
        //return Historial::find($id)->update($request->all());
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $historial = Historial::find($id);
        $historial->descripcion = $request->get('descripcion');
        $historial->accion = $request->get('accion');
        $historial->fecha_accion = $request->get('fecha_accion');
        $historial->hora_accion = $request->get('hora_accion');
        $historial->save();
        return $historial;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $historial = Historial::find($id)->delete();
        return response()->json("Eliminado exitosamente");
    }
}

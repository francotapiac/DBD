<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lugar;
use Validator;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function rules(){
        return
        [
            'pais' => 'required|string',
            'ciudad' => 'required|string',
            'direccion_lugar' => 'required|string',
            'codigo_postal' => 'required|string',
        ];
    }

    public function index()
    {
        $lugars = Lugar::all();
        return $lugars;
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
        /*$lugars = Lugar::create($request->all());
        $lugars->save();
        return response()->json($lugars);*/
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $lugar = new \App\Lugar;
        $lugar->pais=$request->get('pais');
        $lugar->ciudad= $request->get('ciudad');
        $lugar->direccion_lugar=$request->get('direccion_lugar');
        $lugar->codigo_postal=$request->get('codigo_postal');
        $lugar->save();
        return $lugar;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lugars = Lugar::find($id);
        return $lugars;
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
        //return Lugar::find($id)->update($request->all());
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $lugar = Lugar::find($id);
        $lugar->pais = $request->get('pais');
        $lugar->ciudad = $request->get('ciudad');
        $lugar->direccion_lugar = $request->get('direccion_lugar');
        $lugar->codigo_postal = $request->get('codigo_postal');
        $lugar->save();
        return $lugar;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lugars = Lugar::find($id)->delete();
        return response()->json("Eliminado exitosamente");
    }
}

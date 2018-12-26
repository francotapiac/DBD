<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permiso;
use Validator;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function rules(){
        return
        [
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'tipo' => 'required|numeric',
        ];
    }

    public function index()
    {
        $permisos = Permiso::all();
        return $permisos;
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
        /*$permiso = Permiso::create($request->all());
        $permiso->save();
        return response()->json($permiso);*/
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $permiso = new \App\Permiso;
        $permiso->nombre=$request->get('nombre');
        $permiso->descripcion= $request->get('descripcion');
        $permiso->tipo=$request->get('tipo');
        $permiso->save();
        return $permiso;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permiso = Permiso::find($id);
        return $permiso;
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
        //return Permiso::find($id)->update($request->all());
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $permiso = Permiso::find($id);
        $permiso->nombre = $request->get('fecha_recogida');
        $permiso->descripcion = $request->get('fecha_devolucion');
        $permiso->tipo = $request->get('compania');
        $permiso->save();
        return $permiso;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permiso = Permiso::find($id)->delete();
        return response()->json("Eliminado exitosamente");
    }
}

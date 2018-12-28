<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;
use Validator;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function rules(){
        return
        [
            'fecha_recogida' => 'required|string',
            'fecha_devolucion' => 'required|string',
            'compania' => 'required|string',
            'precio_diario' => 'required|numeric',
            'nombre' => 'required|string',
            'capacidad' => 'required|numeric',
            'disponibilidad' => 'required|boolean', 
        ];
    }

    public function index()
    {
        $vehiculo = Vehiculo::all();
        return $vehiculo;
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
        /*¿$vehiculo = Vehiculo::create($request->all());
        $vehiculo->save();
        return response()->json($vehiculo);*/
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $vehiculo = new \App\Vehiculo;
        $vehiculo->fecha_recogida=$request->get('fecha_recogida');
        $vehiculo->fecha_devolucion= $request->get('fecha_devolucion');
        $vehiculo->compania=$request->get('compania');
        $vehiculo->precio_diario=$request->get('precio_diario');
        $vehiculo->nombre= $request->get('nombre');
        $vehiculo->capacidad=$request->get('capacidad');
        $vehiculo->disponibilidad=$request->get('disponibilidad');
        try{
            $id = $request->get('id_lugar');
            $lugar = \App\Lugar::find($id);
            $vehiculo->id_lugar = $id;
            $vehiculo->save();
            return $vehiculo;
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
        $vehiculo = vehiculo::find($id);
        return $vehiculo;
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
        //return Vehiculo::find($id)->update($request->all());
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $vehiculo = Vehiculo::find($id);
        $vehiculo->fecha_recogida = $request->get('fecha_recogida');
        $vehiculo->fecha_devolucion = $request->get('fecha_devolucion');
        $vehiculo->compania = $request->get('compania');
        $vehiculo->precio_diario = $request->get('precio_diario');
        $vehiculo->nombre = $request->get('nombre');
        $vehiculo->capacidad = $request->get('capacidad');
        $vehiculo->disponibilidad = $request->get('disponibilidad');
        try{
            $id = $request->get('id_lugar');
            $lugar = \App\Lugar::find($id);
            $vehiculo->id_lugar = $id;
            $vehiculo->save();
            return $vehiculo;
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
        $vehiculo = Vehiculo::find($id)->delete();
        return response()->json("Eliminado exitosamente");
    }
}

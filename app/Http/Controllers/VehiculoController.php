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
            'id_lugar' => 'required|numeric'
        ];
    }

    public function index(Request $request)
    {
        //Se recibe lo buscado en vista
        $fechaRecogida = $request->get('fecha_recogida');
        $fechaDevolucion = $request->get('fecha_devolucion');
        $compania = $request->get('compania');
        $precioDiario = $request->get('precio_diario');
        $nombre = $request->get('nombre');
        $capacidad = $request->get('capacidad');
        $disponibilidad = $request->get('disponibilidad');
        $ciudad = $request->get('ciudad');
        $pais = $request->get('pais');

        $vehiculos = Vehiculo::orderBy('id_vehiculo','DESC')
        ->fechaRecogida($fechaRecogida)               //Se realiza query scope desde el modelo (con función scopeNombre)
        ->fechaDevolucion($fechaDevolucion)
        ->compania($compania)
        ->precioDiario($precioDiario)
        ->nombre($nombre)
        ->capacidad($capacidad)
        ->disponibilidad($disponibilidad)
        ->ciudad($ciudad)
        ->pais($pais)
        ->paginate(3); 
        
        return view('vehiculo.index',compact('vehiculos')); 
        //return $actividades;

        /*$vehiculo = Vehiculo::all();
        return $vehiculo;*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //return $this->store($request);
        return view('vehiculo.create');
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
        $vehiculo = new Vehiculo();
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
            return redirect()->route('vehiculo.index')->
                with('success','Registro creado satisfactoriamente');
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
        $vehiculo = Vehiculo::find($id);
        return view('vehiculo.show',compact('vehiculos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo = Vehiculo::find($id);
        return view('vehiculo.edit',compact('vehiculo'));
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
            return redirect()->route('vehiculo.index')->with('success','Registro actualizado satisfactoriamente');
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
        return redirect()->route('vehiculo.index')->with('success','Registro eliminado satisfactoriamente');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traslado;
use Validator;

class TrasladoController extends Controller
{
    public function rules(){
        return [
        'precio' => 'required|numeric',
        'capacidad' => 'required|numeric', 
        'compania' => 'required|string',
        'fecha_traslado'=> 'required|date',
        'direccion_destino' => 'required|string',
        'tipo_traslado' => 'required|numeric',
        'id_reserva' => 'required|numeric',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $traslados = Traslado::orderBy('id_traslado','DESC')->paginate(3);
        //return $traslados;
        return view('traslado.index',compact('traslados')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //return $this->store($request);
        $lugars = Lugar::all();
        return view('traslado.create',compact('lugars'));
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
        
        $traslado = new Traslado();
        $traslado->precio = $request->get('precio');
        $traslado->capacidad = $request->get('capacidad');
        $traslado->compania = $request->get('compania');
        $traslado->fecha_traslado = $request->get('fecha_traslado');
        $traslado->direccion_destino = $request->get('direccion_destino');
        $traslado->tipo_traslado = $request->get('tipo_traslado');
        try{
            $id = $request->get('id_reserva');
            $reserva = \App\Reserva::find($id);
            $traslado->id_reserva = $id;
            $traslado->save();
            return $traslado;
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
        $traslado = Traslado::find($id);
        return  view('traslado.show',compact('traslado'));
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
        $validator = Validator::make($request->all(),
                        $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        
        $traslado = Traslado::find($id);
        $traslado->precio = $request->get('precio');
        $traslado->capacidad = $request->get('capacidad');
        $traslado->compania = $request->get('compania');
        $traslado->fecha_traslado = $request->get('fecha_traslado');
        $traslado->direccion_destino = $request->get('direccion_destino');
        $traslado->tipo_traslado = $request->get('tipo_traslado');
        try{
            $id = $request->get('id_reserva');
            $reserva = \App\Reserva::find($id);
            $traslado->id_reserva = $id;
            $traslado->save();
            return $traslado;
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
        $traslado = Traslado::find($id)->delete();
        return response()->json("Eliminado exitosamente");
    }
}

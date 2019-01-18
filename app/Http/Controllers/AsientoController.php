<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asiento;
use Validator;

class AsientoController extends Controller
{
    public function rules(){
        return [
        'numero_asiento' => 'required|numeric',
        'letra_asiento' => 'required|string', 
        'tipo_asiento' => 'required|numeric',
        'disponibilidad' => 'required|numeric',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $numero_asiento = $request->get('numero_asiento');
        $letra_asiento = $request->get('letra_asiento');
        $tipo_asiento = $request->get('tipo_asiento');
        $disponibilidad = $request->get('disponibilidad');

        $asientos = Asiento::orderBy('id_asiento','DESC')
        ->numeroAsiento($numero_asiento)               
        ->letraAsiento($letra_asiento)
        ->tipoAsiento($tipo_asiento)
        ->disponibilidad($disponibilidad)
        ->paginate(3); 
        
        return view('asiento.index',compact('asientos')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('asiento.create');
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
        $asiento = new Asiento();
        $asiento->numero_asiento = $request->get('numero_asiento');
        $asiento->letra_asiento = $request->get('letra_asiento');
        $asiento->tipo_asiento = $request->get('tipo_asiento');
        $asiento->disponibilidad = $request->get('disponibilidad');
        $asiento->save();
        return redirect()->route('asiento.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asiento = Asiento::find($id);
        return  view('asiento.show',compact('asiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asiento = Asiento::find($id);
        return view('asiento.edit',compact('asiento'));
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
        $asiento = Asiento::find($id);
        $asiento->numero_asiento = $request->get('numero_asiento');
        $asiento->letra_asiento = $request->get('letra_asiento');
        $asiento->tipo_asiento = $request->get('tipo_asiento');
        $asiento->disponibilidad = $request->get('disponibilidad');
        $asiento->save();
        return redirect()->route('asiento.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asiento = Asiento::find($id)->delete();
        return redirect()->route('asiento.index')->with('success','Registro eliminado satisfactoriamente');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asiento;

class AsientoController extends Controller
{
    public function rules(){
        return [
        'numero_asiento' => 'required|number',
        'letra_asiento' => 'required|string', 
        'tipo_asiento' => 'required|number',
        'disponibilidad' => 'required|numeric',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$asientos = Asiento::orderBy('letra_asiento','DESC');
        $asientos = Asiento::all();
        return $asientos;
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
        return $asiento;
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
        return $asiento;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        return $asiento;
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
        return response()->json("Eliminado exitosamente");
    }
}

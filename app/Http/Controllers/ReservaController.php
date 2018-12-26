<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use Validator;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function rules(){
        return
        [
            'fecha_reserva' => 'required|string',
            'hora_reserva' => 'required|string',
            'detalle_reserva' => 'required|string',
        ];
    }

    public function index()
    {
        $reservas = Reserva::all();
        return $reservas;
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
        /*$reserva = Reserva::create($request->all());
        $reserva->save();
        return response()->json($reserva);*/

        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $reserva = new \App\Reserva;
        $reserva->fecha_reserva=$request->get('fecha_reserva');
        $reserva->hora_reserva= $request->get('hora_reserva');
        $reserva->detalle_reserva=$request->get('detalle_reserva');
        $reserva->save();
        return $reserva;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva = Reserva::find($id);
        return $reserva;
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
        //return Reserva::find($id)->update($request->all());
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $reserva = Reserva::find($id);
        $reserva->fecha_reserva = $request->get('fecha_reserva');
        $reserva->hora_reserva = $request->get('hora_reserva');
        $reserva->detalle_reserva = $request->get('detalle_reserva');
        $reserva->save();
        return $hotel;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = Reserva::find($id)->delete();
        return response()->json("Eliminado exitosamente");
    }
}

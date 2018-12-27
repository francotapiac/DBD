<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use Validator;

class HotelController extends Controller
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
            'telefono' => 'required|string',
            'compania' => 'required|string',
            'calificacion' => 'required|numeric',
            'descripcion' => 'required|string',
        ];
    }

    public function index()
    {
        $hotels = Hotel::all();
        return $hotels;
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
        /*$hotels = Hotel::create($request->all());
        $hotels->save();
        return response()->json($hotels);*/
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $hotel = new \App\Hotel;
        $hotel->nombre=$request->get('nombre');
        $hotel->telefono= $request->get('telefono');
        $hotel->compania=$request->get('compania');
        $hotel->calificacion=$request->get('calificacion');
        $hotel->descripcion=$request->get('descripcion');
        $hotel->save();
        return $hotel;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotels = Hotel::find($id);
        return $hotels;
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
        //return Hotel::find($id)->update($request->all());
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $hotel = Hotel::find($id);
        $hotel->nombre = $request->get('nombre');
        $hotel->telefono = $request->get('telefono');
        $hotel->compania = $request->get('compania');
        $hotel->calificacion = $request->get('calificacion');
        $hotel->descripcion = $request->get('descripcion');
        $hotel->save();
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
        $hotels = Hotel::find($id)->delete();
        return response()->json("Eliminado exitosamente");
    }
}

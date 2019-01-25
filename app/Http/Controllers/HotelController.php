<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Habitacion;
use Validator;
use App\Lugar;

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

    public function index(Request $request)

    {   /*$fecha_inicio = $request->get('fecha_inicio');
        $fecha_final = $request->get('fecha_final');
        $cantidad_personas = $request->get('cantidad_personas');
        $habitacions = Habitacion::orderBy('id_habitacion','DESC')
        ->fecha($fecha_inicio,$fecha_final)
        ->cantidad($cantidad_personas)
        ->get();*/
        $hotels = Hotel::orderBy('id_hotel','DESC')
        ->paginate(3); 
        return view('hotel.index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $lugars = Lugar::all();
        return view('hotel.create',compact('lugars'));
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
        //return $hotel;
        return redirect()->route('hotel.index')->
                with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        $hotel = Hotel::find($id);
        $habitacions = Habitacion::where('id_hotel',$id)
        ->where('disponibilidad',true)->paginate(3); ;
        return view('habitacion.index',compact('habitacions','hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotel::find($id);
        return view('hotel.edit',compact('hotel'));
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
        //return $hotel;
        return redirect()->route('hotel.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$hotels = Hotel::find($id)->delete();
        //return response()->json("Eliminado exitosamente");
        $hotel = Hotel::find($id)->delete();
        return redirect()->route('hotel.index')->with('success','Registro eliminado satisfactoriamente');
    }
}

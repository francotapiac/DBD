<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habitacion;
use App\Hotel;
use Validator;

class HabitacionController extends Controller
{
    public function rules(){
        return [
        'descripcion' => 'required|string',
        'capacidad' => 'required|numeric', 
        'precio_noche' => 'required|numeric', 
        'disponibilidad' => 'required|numeric', 
        'fecha_llegada' => 'required|date',
        'fecha_ida' => 'required|date',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$lugar = $request->get('lugar');
        $fecha_llegada = $request->get('fecha_llegada');
        $fecha_salida = $request->get('fecha_salida');
        $capacidad = $request->get('capacidad');

        $habitaciones = Hotel::orderBy('id_habitacion','DESC')
    
        ->lugar($lugar)
        ->fechaLlegada($fecha_llegada)
        ->fechaSalida($fecha_salida)
        ->capacidad($capacidad)
        ->disponibilidad(1)
        ->paginate(3); 
        
        return view('hotel.index',compact('habitaciones')); */
   
        $habitacions = Habitacion::orderBy('id_habitacion','DESC')
        ->paginate(3); 
        return $habitacions;
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
        $validator = Validator::make($request->all(),
                        $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        
        $habitacion = new Habitacion();
        $habitacion->descripcion = $request->get('descripcion');
        $habitacion->capacidad = $request->get('capacidad');
        $habitacion->precio_noche = $request->get('precio_noche');
        $habitacion->disponibilidad = $request->get('disponibilidad');
        $habitacion->fecha_llegada = $request->get('fecha_llegada');
        $habitacion->fecha_ida = $request->get('fecha_ida');
        $habitacion->save();
        return $habitacion;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
            
        $habitacion = Habitacion::find($id);
        $hotel = Hotel::find($habitacion->id_hotel);
        return view('habitacion.show',compact('habitacion','hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habitacion = Habitacion::find($id);
        return view('habitacion.edit',compact('habitacion'));
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

        $habitacion = Habitacion::find($id);
        $habitacion->descripcion = $request->get('descripcion');
        $habitacion->capacidad = $request->get('capacidad');
        $habitacion->precio_noche = $request->get('precio_noche');
        $habitacion->disponibilidad = $request->get('disponibilidad');
        $habitacion->fecha_llegada = $request->get('fecha_llegada');
        $habitacion->fecha_ida = $request->get('fecha_ida');
        $habitacion->save();
        return $habitacion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habitacion = Habitacion::find($id)->delete();
        return response()->json("Eliminado exitosamente");
    }
}

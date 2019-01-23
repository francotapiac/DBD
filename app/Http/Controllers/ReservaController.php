<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use App\Actividad;
use App\Usuario;
use Illuminate\Support\Facades\Auth;
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
            'tipo_pago'=> 'required|numeric',
            'id_usuario' => 'required|numeric',
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
    public function create(Request $request)
    {
    
        return view('reserva.create');
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

        $reserva = new Reserva();
        $reserva->fecha_reserva = $request->get('fecha_reserva');
        $reserva->hora_reserva = $request->get('hora_reserva');
        $reserva->detalle_reserva = $request->get('detalle_reserva');
        $reserva->tipo_pago = $request->get('tipo_pago');
        try{
            $id = $request->get('id_usuario');
            $usuario = \App\User::find($id);
            $reserva->id_usuario = $id;
            $reserva->save();
            return $reserva;
        }
        catch(\Exception $e){
            return $e;
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
        $reserva->tipo_pago = $request->get('tipo_pago');
        try{
            $id = $request->get('id_usuario');
            $usuario = \App\User::find($id);
            $reserva->id_usuario = $id;
            $reserva->save();
            return $reserva;
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
        $reserva = Reserva::find($id)->delete();
        return response()->json("Eliminado exitosamente");
    }



    /*public function reservaActividad(Request $request){

        $actividad = Actividad::where('id_actividad',$id_actividad)->first();
        request()->session()->put('busqueda.autos', [
          'costo' => $actividad->costo,
        ]);
        
        $reserva = new Reserva([
            'costo' => request()->session()->get('')]
        );
    }*/

    //Nota: rutas agregarCarro corresponden a controlador CarroController
    //Ver ese controlador.

    
    //Función para realizar reserva de actividad
    public function reservaActividad(Request $request){

        $id_actividad = $request->id_actividad;
        $actividad = Actividad::where('id_actividad',$id_actividad)->first();
        $id_usuario = Auth::user()->id;


        //Crear nueva reserva
        $reserva = new Reserva();
        $reserva->fecha_reserva = new \DateTime();
        $reserva->hora_reserva = new \DateTime();
        $reserva->detalle_reserva = "reserva actividad";
        $reserva->tipo_pago = 1;
        $reserva->id_usuario = $id_usuario;
        $reserva->pago_actual = 0;
        $reserva->pago_actual +=$request->costo;
        $reserva->reserva_realizada = false;
        $reserva->save();

        //Guardar datos en tabla intermedia
        $reserva = Reserva::where('id_usuario',$id_usuario)
        //->where('reserva_realizada',false)
        ->first();
        $reserva->actividads()->attach($id_actividad);
     
        return redirect()->route('agregarCarro');
    }

    public function reservaVehiculo(Request $request){
        return 'hola';
    }

    public function reservaVuelo(Request $request){
        return 'hola';
    }

    public function comprar(Request $request){

       $reserva = Reserva::where([
            ['id_usuario', $request->User()->id],
            ['reserva_realizada', false],
        ])->first();

        $reserva->reserva_realizada = true;
        $reserva->save();

        //Actividad
        $actividads = $reserva->actividads();
       

        return view('usuario.carroCompra', ['actividads' => $actividads,
            'usuarios' => $request->user()]);
    }

}

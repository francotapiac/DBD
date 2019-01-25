<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use App\Actividad;
use App\Habitacion;
use App\Vehiculo;
use App\Usuario;
use App\Vuelo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Session;

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

    
    //Función para realizar reserva de actividad
    public function pagar(){
        if (Session::has("carro")){
                $carro = json_decode(Session::get("carro"));
        }else{
          return redirect("/")->with('failure', 'El carro esta vacío');
        }

        $usuario = null;
        $reserva = new Reserva();
        $reserva->fecha_reserva = Carbon::now();
        $reserva->hora_reserva = Carbon::now();
        $reserva->detalle_reserva = "---";
        $reserva->tipo_pago = 1;
        $reserva->pago_actual = $carro->total;
            $reserva->reserva_realizada = true;
        if(Auth::user()){
            $reserva->id_usuario = $usuario->id;
        }
        else
            $reserva->id_usuario = 3;
        $reserva->save();

        foreach($carro->servicios as $item){

            switch($item->categoria){

                case 'Actividad':
                    $actividad = Actividad::findOrFail($item->id);
                    $reserva->actividads()->attach($item->id);
                    $actividad->cantidad = $actividad->cantidad - $item->cantidad;
                    $actividad->save();
                    break;

                case 'Habitacion':
                    $habitacion = Habitacion::findOrFail($item->id);
                    $reserva->habitacions()->attach($item->id);
                    $habitacion->disponibilidad =false;
                    $habitacion->save();
                    break;

                case 'Vehiculo':
                    $vehiculo = Vehiculo::findOrFail($item->id);
                    $reserva->vehiculos()->attach($item->id);
                    $vehiculo->disponibilidad =false;
                    $vehiculo->save();
                    break;

                case 'Vuelo':
                    $vuelo = Vuelo::findOrFail($item->id);
                    $reserva->vuelos()->attach($item->id);
                    $vuelo->save();
                    break;

            }   

            Session::forget("carro");
            return redirect("/")->with('success', 'La compra fue realizada con éxito');
        }

        //Crear nueva reserva
        


    }

}

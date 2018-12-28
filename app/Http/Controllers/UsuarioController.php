<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function rules(){
        return
        [
            'primer_nombre' => 'required|string',
            'segundo_nombre' => 'required|string',
            'primer_apellido' => 'required|string',
            'segundo_apellido'=> 'required|string',
            'email' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'edad' => 'required|numeric',
            'ciudad_residencia' => 'required|string',
            'calle_residencia'=> 'required|string',
            'pais_residencia' => 'required|string',
            'password' => 'required|string',
            'numero_celular'=> 'required|string',
            'tipo_documento' => 'required|numeric',
            'tipo_pago' => 'required|numeric',
            'estado'=> 'required|numeric',
            'remember_token' => 'required|string',
        ];
    }

    public function index()
    {
        $usuario = User::all();
        return $usuario;
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
        
        $usuario = new User();
        $usuario->primer_nombre = $request->get('primer_nombre');
        $usuario->segundo_nombre = $request->get('segundo_nombre');
        $usuario->primer_apellido = $request->get('primer_apellido');
        $usuario->segundo_apellido = $request->get('segundo_apellido');
        $usuario->email = $request->get('email');
        $usuario->edad = $request->get('edad');
        $usuario->ciudad_residencia = $request->get('ciudad_residencia');
        $usuario->calle_residencia = $request->get('calle_residencia') ;
        $usuario->pais_residencia = $request->get('pais_residencia');
        $usuario->password = $request->get('password');
        $usuario->numero_celular = $request->get('numero_celular');
        $usuario->tipo_documento = $request->get('tipo_documento') ;
        $usuario->tipo_pago = $request->get('tipo_pago');
        $usuario->estado = $request->get('estado');
        $usuario->remember_token = $request->get('remember_token');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        return $usuario;
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
        
        $usuario = User::find($id);
        $usuario->primer_nombre = $request->get('primer_nombre');
        $usuario->segundo_nombre = $request->get('segundo_nombre');
        $usuario->primer_apellido = $request->get('primer_apellido');
        $usuario->segundo_apellido = $request->get('segundo_apellido');
        $usuario->email = $request->get('email');
        $usuario->edad = $request->get('edad');
        $usuario->ciudad_residencia = $request->get('ciudad_residencia');
        $usuario->calle_residencia = $request->get('calle_residencia') ;
        $usuario->pais_residencia = $request->get('pais_residencia');
        $usuario->password = $request->get('password');
        $usuario->numero_celular = $request->get('numero_celular');
        $usuario->tipo_documento = $request->get('tipo_documento') ;
        $usuario->tipo_pago = $request->get('tipo_pago');
        $usuario->estado = $request->get('estado');
        $usuario->remember_token = $request->get('remember_token');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id)->delete();
        return response()->json("Eliminado exitosamente");
    }
}

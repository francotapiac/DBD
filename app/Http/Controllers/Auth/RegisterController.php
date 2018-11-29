<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Rol;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'primer_nombre' => 'required|string|max:45',
            'segundo_nombre' => 'required|string|max:45',
            'primer_apellido' => 'required|string|max:36',
            'segundo_apellido' => 'required|string|max:36',
            'email' => 'required|string|email|max:255|unique:users',
            'fecha_nacimiento' => 'required|date',
            'password' => 'required|string|min:6|confirmed',
            'edad' => 'required|integer',
            'ciudad_residencia' => 'required|string|max:100',
            'calle_residencia' => 'required|string|max:100',
            'pais_residencia' => 'required|string|max:50',
            'numero_celular' => 'required|string|max:20',
            'tipo_documento' => 'required|integer',
            'tipo_pago' => 'required|integer',
            'estado' => 'required|integer',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'primer_nombre' => $data['primer_nombre'],
            'segundo_nombre' => $data['segundo_nombre'],
            'primer_apellido' =>$data['primer_apellido'],
            'segundo_apellido' => $data['segundo_apellido'],
            'email' => $data['email'],
            'fecha_nacimiento' =>$data['fecha_nacimiento'],
            'edad' => $data['edad'],
            'ciudad_residencia' =>$data['ciudad_residencia'],
            'calle_residencia' =>$data['calle_residencia'],
            'pais_residencia' => $data['pais_residencia'],
            'numero_celular' =>$data['numero_celular'],
            'tipo_documento' => $data['tipo_documento'],
            'tipo_pago' => $data['tipo_pago'],
            'estado' =>$data['estado'],
            'password' => Hash::make($data['password']),

        ]);

        //Crea usuarios por defecto (no admin)
        $user
        ->rols()->attach(Rol::where('nombre','usuario')->first());
        return $user;
    }
}

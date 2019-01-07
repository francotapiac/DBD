<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;
use Validator;

class ActividadController extends Controller
{
    public function rules(){
        return [
        'nombre' => 'required|string',
        'descripcion' => 'required|string', 
        'costo' => 'required|numeric',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        //Se recibe lo buscado en vista
        $nombre = $request->get('nombre');
        $descripcion = $request->get('descripcion');
        $costo = $request->get('costo');

        $actividades = Actividad::orderBy('id_actividad','DESC')
        ->nombre($nombre)               //Se realiza query scope desde el modelo (con función scopeNombre)
        ->descripcion($descripcion)
        ->costo($costo)
        ->paginate(3); 
        
        return view('actividad.index',compact('actividades')); 
        //return $actividades;
        
        /*$actividades = Actividad::all();
        return $actividades;*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //return $this->store($request);
       return view('actividad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$this->validate($request,['nombre'=>'required', 'descripcion'=>'required', 'costo'=>'required']);
        Actividad::create($request->all());
        //route::get('/habitacion/store','HabitacionController@store')
        return redirect()->route('actividad.index')->with('success','Registro creado satisfactoriamente');
        */

        $validator = Validator::make($request->all(),
                        $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $actividad = new Actividad();
        $actividad->nombre = $request->get('nombre');
        $actividad->descripcion = $request->get('descripcion');
        $actividad->costo = $request->get('costo');
        $actividad->save();

        $actividad->lugars()->attach($request->get('pais'));
         return redirect()->route('actividad.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actividad = Actividad::find($id);
        return  view('actividad.show',compact('actividad'));
        return $actividad;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividad = Actividad::find($id);
        return view('actividad.edit',compact('actividad'));
        
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
        /*$this->validate($request,['nombre'=>'required', 'descripcion'=>'required', 'costo'=>'required']);
        Actividad::find($id)->update($request->all());
        return redirect()->route('actividad.index')->with('success','Registro actualizado satisfactoriamente');
        */
        $validator = Validator::make($request->all(),
                        $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        
        $actividad = Actividad::find($id);
        $actividad->nombre = $request->get('nombre');
        $actividad->descripcion = $request->get('descripcion');
        $actividad->costo = $request->get('costo');
        $actividad->save();
        return redirect()->route('actividad.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*//es necesario guardarlo en variables?
        Actividad::find($id)->delete();
        return redirect()->route('actividad.index')->with('success','Registro eliminado satisfactoriamente');
        */
        $actividades = Actividad::find($id)->delete();
       return redirect()->route('actividad.index')->with('success','Registro eliminado satisfactoriamente');
    }
}

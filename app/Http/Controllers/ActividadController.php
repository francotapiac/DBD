<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;

class ActividadController extends Controller
{
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $this->validate($request,['nombre'=>'required', 'descripcion'=>'required', 'costo'=>'required']);
        Actividad::create($request->all());
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
        $this->validate($request,['nombre'=>'required', 'descripcion'=>'required', 'costo'=>'required']);
        Actividad::find($id)->update($request->all());
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
        Actividad::find($id)->delete();
        return redirect()->route('actividad.index')->with('success','Registro eliminado satisfactoriamente');
    }
}

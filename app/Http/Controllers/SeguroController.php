<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seguro;
use Validator;

class SeguroController extends Controller
{
    public function rules(){
        return [
        'nombre_seguro' => 'required|string',
        'descripcion' => 'required|string',
        'precio' => 'required|numeric', 
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguro = Seguro::all();
        return $seguro;
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
        
        $seguro = new Seguro();
        $seguro->nombre_seguro = $request->get('nombre_seguro');
        $seguro->descripcion = $request->get('descripcion');
        $seguro->precio = $request->get('precio');
        $seguro->save();
        return $permiso;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seguro = Seguro::find($id);
        return $seguro;
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
        
        $seguro = Seguro::find($id);
        $seguro->nombre_seguro = $request->get('nombre_seguro');
        $seguro->descripcion = $request->get('descripcion');
        $seguro->precio = $request->get('precio');
        $seguro->save();
        return $seguro;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seguro = Seguro::find($id)->delete();
        return response()->json("Eliminado exitosamente");
    }
}

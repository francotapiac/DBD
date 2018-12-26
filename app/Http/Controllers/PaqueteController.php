<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function rules(){
        return
        [
            'precio_por_persona' => 'required|numeric',
            'descripcion' => 'required|string',
            'descuento' => 'required|numeric',
        ];
    }

    public function index(Request $request)
    {
        //Se recibe lo buscado en vista
        /*$precio = $request->get('precio_por_persona');
        $descripcion = $request->get('descripcion');
        $descuento = $request->get('descuento');

        $paquetes = Paquete::orderBy('id_paquete','DESC')
        ->precio($precio)               //Se realiza query scope desde el modelo (con función scopeNombre)
        ->descripcion($descripcion)
        ->descuento($descuento)
        ->paginate(7); 
        return view('paquete.index',compact('paquetes')); */
        $paquetes = Paquete::all();
        return $paquetes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('paquete.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$this->validate($request,['precio_por_persona'=>'required', 'descripcion'=>'required', 'descuento'=>'required']);
        Paquete::create($request->all());
        return redirect()->route('paquete.index')->with('success','Registro creado satisfactoriamente');*/

        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $paquete = new \App\Paquete;
        $paquete->precio_por_persona=$request->get('precio_por_persona');
        $paquete->descripcion= $request->get('descripcion');
        $paquete->descuento=$request->get('descuento');
        $paquete->save();
        return $paquete;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$paquete = Paquete::find($id);
        return  view('paquete.show',compact('paquete'));*/
        $paquete = Paquete::find($id);
        return $paquete;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$paquete = Paquete::find($id);
        //return view('paquete.edit',compact('paquete'));
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
       /*this->validate($request,['precio_por_persona'=>'required', 'descripcion'=>'required', 'descuento'=>'required']);
        Paquete::find($id)->update($request->all());
        return redirect()->route('paquete.index')->with('success','Registro actualizado satisfactoriamente');*/
        //return Paquete::find($id)->update($request->all());
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $paquete = Paquete::find($id);
        $paquete->precio_por_persona = $request->get('precio_por_persona');
        $paquete->descripcion = $request->get('descripcion');
        $paquete->descuento = $request->get('descuento');
        $paquete->save();
        return $paquete;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*Paquete::find($id)->delete();
        return redirect()->route('paquete.index')->with('success','Registro eliminado satisfactoriamente');*/
        $paquete = Paquete::find($id)->delete();
        return response()->json("Eliminado exitosamente");
    }
}

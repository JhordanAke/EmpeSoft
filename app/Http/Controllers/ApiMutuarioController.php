<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mutuario;


class ApiMutuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Mutuario::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $mutuario = new Mutuario;
        $mutuario->nombre=$request->get('nombre');
        $mutuario->apellido_p=$request->get('apellido_p');
        $mutuario->apellido_m=$request->get('apellido_m');
        $mutuario->telefono=$request->get('telefono');
        $mutuario->direccion=$request->get('direccion');
        $mutuario->localidad=$request->get('localidad');

        $mutuario->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $mutuario = Mutuario::find($id);
        return $mutuario;
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
         $mutuario=Mutuario::find($id);

        $mutuario->nombre=$request->post('nombre');
        $mutuario->apellido_p=$request->post('apellido_p');
        $mutuario->apellido_m=$request->post('apellido_m');
        $mutuario->telefono=$request->post('telefono');
        $mutuario->direccion=$request->post('direccion');
        $mutuario->localidad=$request->post('localidad');
     
        $mutuario->update();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
                return Mutuario::destroy($id);
    }
}

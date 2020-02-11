<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;

class ApiPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Personal::all();
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
          $personal = new Personal;
        $personal->nombre=$request->get('nombre');
        $personal->apellido_p=$request->get('apellido_p');
        $personal->apellido_m=$request->get('apellido_m');
        $personal->contrasenia=$request->get('contrasenia');
        $personal->id_puesto=$request->get('id_puesto');

        $personal->save();
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
         $personal = Personal::find($id);
        return $personal;
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
        //
        $personal=Personal::find($id);

        $personal->id_personal=$request->post('id_personal');
        $personal->nombre=$request->post('nombre');
        $personal->id_puesto=$request->post('id_puesto');
        $personal->apellido_p=$request->post('apellido_p');
        $personal->apellido_m=$request->post('apellido_m');
        $personal->contrasenia=$request->post('contrasenia');
     
        $personal->update();
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
        return Personal::destroy($id);
    }
}

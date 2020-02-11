<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empeño;

class ApiEmpeñoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Empeño::all();
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
        $empeño = new Empeño;
        $empeño->id_empenio=$request->get('id_empenio');
        $empeño->nombre_articulo=$request->get('nombre_articulo');
        $empeño->id_mutuario=$request->get('id_mutuario');
        $empeño->fecha_empenio=$request->get('fecha_empenio');
        $empeño->capital=$request->get('capital');
        $empeño->descripcion=$request->get('descripcion');
        $empeño->limite=$request->get('limite');
        $empeño->categoria=$request->get('categoria');
        $empeño->status=$request->get('status');


        $empeño->save();
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
         $empeño = Empeño::find($id);
        return $empeño;
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
        $empeño=Empeño::find($id);
         $empeño->nombre_articulo=$request->post('nombre_articulo');
        $empeño->id_mutuario=$request->post('id_mutuario');
        $empeño->fecha_empenio=$request->post('fecha_empenio');
        $empeño->capital=$request->post('capital');
        $empeño->descripcion=$request->post('descripcion');
        $empeño->limite=$request->post('limite');
        $empeño->categoria=$request->post('categoria');
        $empeño->status=$request->post('status');

        $empeño->update();
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
        return Empeño::destroy($id);
    }
}

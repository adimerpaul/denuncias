<?php

namespace App\Http\Controllers;

use App\Denuncia;
use Illuminate\Http\Request;

class DenunciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Denuncia::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $denuncia=new Denuncia();
        if ($request->solicitud!=null)
        $denuncia->solicitud=$request->solicitud;
        if ($request->nombre!=null)
        $denuncia->nombre=$request->nombre;
        if ($request->ci!=null)
        $denuncia->ci=$request->ci;
        if ($request->celular!=null)
        $denuncia->celular=$request->celular;
        if ($request->correo!=null)
        $denuncia->correo=$request->correo;
        if ($request->direccion!=null)
        $denuncia->direccion=$request->direccion;
        if ($request->denunciados!=null)
        $denuncia->denunciados=$request->denunciados;
        if ($request->descripcion!=null)
        $denuncia->descripcion=$request->descripcion;
        $denuncia->save();
        return $denuncia;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function show(Denuncia $denuncia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function edit(Denuncia $denuncia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Denuncia $denuncia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denuncia $denuncia)
    {
        //
    }
}
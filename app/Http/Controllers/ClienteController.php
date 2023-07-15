<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes=Cliente::all();
        return view('cliente.index')->with('clientes',$clientes);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $clientes=new Cliente();
        $clientes->name=$request->get('nombre');
        $clientes->number=$request->get('numero');
        $clientes->email=$request->get('email');
        $clientes->description=$request->get('descripcion');
        $clientes->save();
        return redirect('/clientes');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clientes=Cliente::find($id);
        return view('cliente.edit')->with('clientes',$clientes);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $clientes=Cliente::find($id);
        $clientes->name=$request->get('nombre');
        $clientes->number=$request->get('numero');
        $clientes->email=$request->get('email');
        $clientes->description=$request->get('descripcion');
        $clientes->update();
        return redirect('/clientes');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $clientes=Cliente::find($id);
        $clientes->delete();
        return redirect('/clientes');
        //
    }
}

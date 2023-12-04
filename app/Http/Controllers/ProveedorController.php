<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedor.index')->with('proveedores',$proveedores);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedores = Proveedor::all();
        return view('proveedor.create')->with('proveedores', $proveedores);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proveedores=new Proveedor();
        $proveedores->name=$request->get('nombre');
        $proveedores->number=$request->get('numero');
        $proveedores->email=$request->get('email');
        $proveedores->product=$request->get('producto');
        $proveedores->description=$request->get('descripcion');
        $proveedores->save();
        return redirect('/proveedores');
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
    $proveedor = Proveedor::find($id); // Fetch a single Proveedor by ID
    return view('proveedor.edit', compact('proveedor')); // Pass a single Proveedor object to the view
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $proveedores=Proveedor::find($id);
        $proveedores->name=$request->get('nombre');
        $proveedores->number=$request->get('numero');
        $proveedores->email=$request->get('email');
        $proveedores->product=$request->get('producto');
        $proveedores->description=$request->get('descripcion');
        $proveedores->update();
        return redirect('/proveedores');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proveedores=Proveedor::find($id);
        $proveedores->delete();
        return redirect('/proveedor');
        //
    }
}

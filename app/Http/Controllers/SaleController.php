<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cliente;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales=Sale::all();
        $productos=Product::all();
        $proveedores=Proveedor::all();
        
        return view('sale.index', compact('sales','productos','proveedores'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sales = Sale::all();
        $proveedores = Proveedor::all();
        $products = Product::all();
        $clientes=Cliente::all();
        $precioProducto = $products->pluck('sale_price')->first();
        
        return view('sale.create', compact('sales', 'proveedores', 'products', 'precioProducto','clientes'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idcliente' => 'required', // Cambié 'proveedor_id' a 'idcliente'
            'idproducto' => 'required',
            'cantidad' => 'required|numeric',
            'precio' => 'required|numeric',
        ]);

        $sale = new Sale();
        $sale->cliente_id = $request->input('idcliente'); // Cambié 'proveedor_id' a 'idcliente'
        $sale->product_id = $request->input('idproducto'); // Cambié 'product_id' a 'idproducto'
        $sale->qty = $request->input('cantidad');
        $sale->price = $request->input('precio');
        $sale->total = $request->input('cantidad') * $request->input('precio');
        $sale->save();

        $product = Product::find($request->input('idproducto'));
        $product->stock -= $request->input('cantidad');
        $product->save();

        return redirect('/sales')->with('success', 'Venta creada exitosamente');
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
        $sales=Sale::find($id);
        $proveedores=Proveedor::all();
        $products=Product::all();
        $clientes=Cliente::all();
        return view('sale.edit',compact('sales','proveedores','products','clientes'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sales = Sale::find($id);
        $sales->qty = $request->input('cantidad');
        $sales->price = $request->input('precio');
        $sales->total = $request->input('cantidad') * $request->input('precio');
        $sales->save();
        
        // 
        return redirect('/sales');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sales = Sale::find($id);
        $sales->delete();

        return redirect('/sales');
    }
}
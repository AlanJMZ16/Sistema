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

        $data = [
            'labels' => ['Utilidad', 'Ganancias', 'Marzo', 'Abril', 'Mayo'],
            'datasets' => [
                [
                    'label' => 'Ventas',
                    'data' => [120, 150, 180, 90, 200],
                    'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)'],
                    'borderColor' => ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)'],
                    'borderWidth' => 1
                ]
            ]
        ];
        
        return view('sale.index', compact('data','sales','productos','proveedores'));
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

    public function updateStock(Request $request, Product $product)
    {
    $newQuantity = $product->stock - $request->input('quantity');
    
    if ($newQuantity >= 0) {
        $product->update(['stock' => $newQuantity]);
        return response()->json(['message' => 'Stock updated successfully'], 200);
    } else {
        return response()->json(['error' => 'Insufficient stock'], 400);
    }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar los datos del formulario de venta
    $validatedData = $request->validate([
        'proveedor_id' => 'required',
        'product_id' => 'required',
        'cantidad' => 'required|numeric',
        'precio' => 'required|numeric',
    ]);

    // Crear una nueva venta
    $sale = new Sale();
    $sale->cliente_id = $request->input('cliente_id'); // Reemplaza 'proveedor_id' por 'cliente_id'
    $sale->product_id = $request->input('product_id');
    $sale->qty = $request->input('cantidad');
    $sale->price = $request->input('precio');
    $sale->total = $request->input('cantidad') * $request->input('precio');
    $sale->save();

    // Restar la cantidad vendida del producto
    $product = Product::find($request->input('product_id'));
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
        $sales=Sale::all();
        $proveedores=Proveedor::all();
        $productos=Product::all();
        return view('sale.edit',compact('sales','proveedores','productos'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sale = Sale::find($id);
        $sale->idproveedor = $request->input('idproveedor');
        $sale->qty = $request->input('cantidad');
        $sale->price = $request->input('precio');
        $sale->total = $request->input('cantidad') * $request->input('precio');
        $sale->save();
        
        // 
        return redirect('/sales')->with('success', 'Venta actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $sale = Sale::find($id);
    $sale->delete();
    return redirect('/sales')->with('success', 'Venta eliminada exitosamente');
}
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Proveedor;
use App\Models\Sale;
use Illuminate\Http\Request;

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
            'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
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
        $sales=Sale::all();
        $proveedores=Proveedor::all();
        $productos=Product::all();
        return view('sale.create',compact('sales','proveedores','productos'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sales=new Sale();
        $sales->proveedores_id=$request->input('idproveedor');
        $sales->qty=$request->input('cantidad');
        $sales->name=$request->input('precio');
        $sales->buy_price=$request->input('taxes');
        $sales->sale_price=$request->input('total');
        $sales->save();
        return redirect('/sales');
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
        $sales=Sale::find($id);
        $sales->proveedores_id=$request->input('idproveedor');
        $sales->qty=$request->input('cantidad');
        $sales->name=$request->input('precio');
        $sales->buy_price=$request->input('taxes');
        $sales->sale_price=$request->input('total');
        $sales->update();
        return redirect('/sales');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $id)
    {
        $sales=Sale::find($id);
        $sales->delete();
        return redirect('/sales');
        //
    }
}

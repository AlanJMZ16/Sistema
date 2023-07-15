<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::find('id');
        $proveedores = Proveedor::find('id');
        return view('product.index', compact('products', 'categories','proveedores'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        $proveedores = Proveedor::all();
        return view('product.create', compact('products', 'categories','proveedores'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products=new Product;
        $products->name=$request->input('nombre');
        $products->stock=$request->input('stock');
        $products->buy_price=$request->input('precioC');
        $products->sale_price=$request->input('venta');
        $products->tax=$request->input('taxes');
        $products->description=$request->input('descripcion');
        $products->categorie_id=$request->input('idcategoria');
        $products->proveedores_id=$request->input('idproveedor');
        $products->save();
        return redirect('/products');
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

        $products = Product::find($id);
        $categories = Category::all();
        $proveedores = Proveedor::all();
        return view('product.edit', compact('products', 'categories','proveedores'));
        //
    }

    /**s
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $products=Product::find($id);
        $products->name=$request->input('nombre');
        $products->stock=$request->input('stock');
        $products->buy_price=$request->input('precioC');
        $products->sale_price=$request->input('venta');
        $products->tax=$request->input('taxes');
        $products->description=$request->input('descripcion');
        $products->categorie_id=$request->input('idcategoria');
        $products->proveedores_id=$request->input('idproveedor');
        $products->update();
        return redirect('/products');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products=Product::find($id);
        $products->delete();
        return redirect('/products');
        //
    }
}

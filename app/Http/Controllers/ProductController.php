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
        $categories = Category::all();
        $proveedores = Proveedor::all();
        return view('product.index', compact('products', 'categories','proveedores'));
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product; // Cambiado a $product
        $product->name = $request->input('nombre');
        $product->stock = $request->input('stock');
        $product->buy_price = $request->input('precioC');
        $product->sale_price = $request->input('venta');
        $product->tax = $request->input('taxes');
        $product->description = $request->input('descripcion');
        $product->categorie_id = $request->input('idcategoria');
        $product->proveedores_id = $request->input('idproveedor');
        $product->save();
        return redirect('/products');
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

        $product = Product::find($id); // Cambiado a $product
        $categories = Category::all();
        $proveedores = Proveedor::all();
        return view('product.edit', compact('product', 'categories','proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id); // Cambiado a $product
        $product->name = $request->input('nombre');
        $product->stock = $request->input('stock');
        $product->buy_price = $request->input('precioC');
        $product->sale_price = $request->input('venta');
        $product->tax = $request->input('taxes');
        $product->description = $request->input('descripcion');
        $product->categorie_id = $request->input('idcategoria');
        $product->proveedores_id = $request->input('idproveedor');
        $product->update();
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id); // Cambiado a $product
        $product->delete();
        return redirect('/products');
    }
}

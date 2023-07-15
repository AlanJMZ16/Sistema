<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('category.index')->with('categories',$categories);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories=new Category;
        $categories->name=$request->input('nombre');
        $categories->description=$request->input('descripcion');
        $categories->save();
        return redirect('/categories');
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
        $categories=Category::find($id);
        return view('category.edit')->with('categories',$categories);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categories=Category::find($id);
        $categories->name=$request->input('nombre');
        $categories->description=$request->input('descripcion');
        $categories->update();
        return redirect('/categories');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categories=Category::find($id);
        $categories->delete();
        return redirect('/categories');
        //
    }
}

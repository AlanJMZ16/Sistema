<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary; // Asegúrate de importar el modelo Salary si ya lo has creado

class SalaryController extends Controller
{
    /**
     * Muestra una lista de salarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaries = Salary::all();
        return view('salary.index', compact('salaries'));
    }

    /**
     * Muestra el formulario para crear un nuevo salario.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salaries=Salary::all();
        return view('salary.create', compact('salaries'));
    }

    /**
     * Almacena un nuevo salario en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salaries=new Salary;
        $salaries->name_w=$request->input('name_w');
        $salaries->payment=$request->input('payment');
        $salaries->hours=$request->input('hours');
        $salaries->total=$request->input('total');
        $salaries->save();

        return redirect('/salaries');
    }

    /**
     * Muestra la información de un salario específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salary = Salary::find($id);
        return view('salary.show', compact('salary'));
    }

    /**
     * Muestra el formulario para editar un salario.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salaries = Salary::find($id);

        return view('salary.edit', compact('salaries'));
    }

    /**
     * Actualiza un salario específico en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $salaries=Salary::find($id);
        $salaries->name_w=$request->input('name_w');
        $salaries->payment=$request->input('payment');
        $salaries->hours=$request->input('hours');
        $salaries->total=$request->input('total');
        $salaries->update();

        return redirect('/salaries');

    }

    /**
     * Elimina un salario específico de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salary = Salary::find($id);
        $salary->delete();

        return redirect('/salaries');
    }
}

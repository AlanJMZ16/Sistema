<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use Illuminate\Http\Request;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informes=Informe::all();
        $sales=Sale::all();
        return view('informe.index',compact('informes','sales'));
        //
    }
    public function generarReporteVentas(Request $request)
    {
        $intervalo = $request->input('intervalo');

        $ventas = Sale::select('added_at', Sale::raw('SUM(total) as total'))
            ->groupBy('added_at');
    
        if ($intervalo === 'diario') {
            $ventas->whereDate('added_at', Carbon::now()->toDateString());
        } elseif ($intervalo === 'semanal') {
            $ventas->whereBetween('added_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ]);
        } elseif ($intervalo === 'mensual') {
            $ventas->whereMonth('added_at', Carbon::now()->month);
        } elseif (empty($intervalo)) {
            $intervalo = 'diario';
        }
    
        $ventas = $ventas->get();
    
        return view('informe.index', compact('ventas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
    public function edit(Informe $informe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Informe $informe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informe $informe)
    {
        //
    }
}

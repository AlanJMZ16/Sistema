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
    $selectedOption = $request->input('intervalo');
    $ventasDiarias = [];
    $ventasSemanales = [];
    $ventasMensuales = [];

    if ($selectedOption === 'diario') {
        // Realiza la consulta de ventas diarias y almacena los resultados en $ventasDiarias
        $ventasDiarias = Ventas::where('created_at', '>=', now()->subDay())->get();
    } elseif ($selectedOption === 'semanal') {
        // Realiza la consulta de ventas semanales y almacena los resultados en $ventasSemanales
        $ventasSemanales = Ventas::where('created_at', '>=', now()->subWeek())->get();
    } elseif ($selectedOption === 'mensual') {
        // Realiza la consulta de ventas mensuales y almacena los resultados en $ventasMensuales
        $ventasMensuales = Ventas::where('created_at', '>=', now()->subMonth())->get();
    }

    return view('informe.index', compact('ventasDiarias', 'ventasSemanales', 'ventasMensuales', 'selectedOption'));
    }


    
    public function reporteVentas()
    {
    // Obtén todas las ventas
    $ventas = Sale::with('cliente')->get();
    
    // Realiza cálculos para obtener las ventas totales por cliente y en general
    $ventasPorCliente = $ventas->groupBy('cliente_id');
    $ventasGenerales = $ventas->sum('total');
    
    return view('informe.index', compact('ventasPorCliente', 'ventasGenerales'));
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

    public function showDaily()
    {
        $sales = Sale::whereDate('added_at', today())->get();

        return view('sales.index', compact('sales'));
    }

    public function showWeekly()
    {
        $sales = Sale::whereBetween('added_at', [now()->startOfWeek(), now()->endOfWeek()])->get();

        return view('sales.index', compact('sales'));
    }

    public function showMonthly()
    {
        $sales = Sale::whereYear('added_at', now()->year)->whereMonth('added_at', now()->month)->get();

        return view('sales.index', compact('sales'));
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

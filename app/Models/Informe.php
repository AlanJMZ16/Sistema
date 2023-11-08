<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;

    public function reporteVentas()
    {
    // Obtén todas las ventas
    $ventas = Sale::with('cliente')->get();
    
    // Realiza cálculos para obtener las ventas totales por cliente y en general
    $ventasPorCliente = $ventas->groupBy('cliente_id');
    $ventasGenerales = $ventas->sum('total');
    
    return view('informe.index', compact('ventasPorCliente', 'ventasGenerales'));
}
}




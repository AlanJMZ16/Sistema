<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;
    protected $table='informes';
    protected $primaryKey='id';
    protected $fillable=['added_at','sale_id','created_at','added_at'];
    public $timestamps=false;
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




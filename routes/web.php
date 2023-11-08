<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\InformeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/update-stock/{product}', 'SaleController@updateStock')->name('update-stock');
Route::resource('categories',CategoryController::class);
Route::resource('welcome','App\Http\Controllers\WelcomeController');
Route::resource('clientes','App\Http\Controllers\ClienteController');
Route::resource('proveedores','App\Http\Controllers\ProveedorController');
Route::resource('products',ProductController::class);
Route::resource('sales',SaleController::class);
Route::resource('salary',SalaryController::class);
Route::resource('informes','App\Http\Controllers\InformeController');
Route::get('informes', [InformeController::class, 'generarReporteVentas'])->name('informe.index');


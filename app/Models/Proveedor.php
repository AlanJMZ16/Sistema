<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table='proveedores';
    protected $primaryKey='id';
    protected $fillable=['name','number','email','product','description'];
    public $timestamps=false;
}

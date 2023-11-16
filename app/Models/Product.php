<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable=['name','quantity','buy_price','sale_price','categorie_id','proveedores_id','added_at'];
    public $timestamps=false;

    public function Categoria(){
        return $this->hasOne(Category::class,'id','categorie_id');
    }

    public function Proveedor(){
        return $this->hasOne(Proveedor::class,'id','proveedores_id');
    }
}

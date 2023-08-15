<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    
    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $fillable = ['product_id', 'qty', 'price', 'total', 'added_at'];
    public $timestamps = false;
    
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}

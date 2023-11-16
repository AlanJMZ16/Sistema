<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $table='salaries';
    protected $primarykey='id';
    protected $fillable=['added_at','total','sale','created_at','updated_at'];
    public $timestamp=false;
}

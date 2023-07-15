<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proveedor;

class proveedores extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proveedor::create([
            'name' => 'No aplica',
            'number' => '000-000-0000',
            'email' => '',
            'product' => '',
            'description' => '',
            // ...
        ]);
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->string('number');
            $table->string('email')->unique()->nullable();
            $table->text('description')->nullable();
            $table->timestamps(); 
        });

        //proveedores table
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->string('number');
            $table->string('email')->nullable();
            $table->text('product')->nullable();
            $table->text('description')->nullable();
            $table->timestamps(); 
        });

        //categories table
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 60)->unique();
            $table->text('description')->nullable();
            $table->timestamps(); 
        });

        //products table
        Schema::create('products', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 255)->unique();
            $table->integer('stock');
            $table->decimal('buy_price', 8, 2)->nullable();
            $table->decimal('sale_price', 8, 2);
            $table->decimal('tax', 8, 2)->nullable();
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('proveedores_id');
            $table->text('description')->nullable();
            $table->timestamps(); 

            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('proveedores_id')->references('id')->on('proveedores')->onDelete('cascade')->onUpdate('cascade');
        });

        // sales table
        Schema::create('sales', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('product_id'); 
            $table->integer('qty');
            $table->decimal('price', 8, 2);
            $table->decimal('total', 8, 2);
            $table->timestamps(); 

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade')->onUpdate('cascade');
        });

        // salary table
        Schema::create('salaries', function (Blueprint $table) {
            $table->id(); 
            $table->string('name_w')->unique();
            $table->decimal('payment');
            $table->integer('hours');
            $table->decimal('total');

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('proveedores');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('sales');
        Schema::dropIfExists('salaries');
    }
};

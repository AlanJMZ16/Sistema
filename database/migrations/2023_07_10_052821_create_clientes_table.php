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
            $table->increments('id');
            $table->string('name');
            $table->string('number');
            $table->string('email')->unique()->nullable();
            $table->text('description')->nullable();
            $table->timestamp('added_at', $precision = 0);
        });
        //proveedores table
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('number');
            $table->string('email')->nullable();
            $table->text('product')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('added_at', $precision = 0);
        });
        // categories table
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60)->unique();
            $table->text('description')->nullable();
            $table->timestamp('added_at', $precision = 0);
        });

        //products table
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->unique();
            $table->integer('stock');
            $table->decimal('buy_price', 8, 2)->nullable();
            $table->decimal('sale_price', 8, 2);
            $table->decimal('tax', 8, 2)->nullable();
            $table->unsignedInteger('categorie_id');
            $table->unsignedInteger('proveedores_id');
            $table->text('description')->nullable();
            $table->timestamp('added_at', $precision = 0);

            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('proveedores_id')->references('id')->on('proveedores')->onDelete('cascade')->onUpdate('cascade');

        });

        // sales table
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('proveedor_id');
            $table->unsignedInteger('product_id');
            $table->integer('qty');
            $table->decimal('price', 8, 2);
            $table->decimal('total', 8, 2);
            $table->timestamp('added_at', $precision = 0);

            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade')->onUpdate('cascade');
        });
        //informes table
        Schema::create('informes', function (Blueprint $table) {
            $table->id();
            $table->string('added_at');
            $table->decimal('total', 8, 2);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('producto');
        Schema::dropIfExists('sales');
    }
};

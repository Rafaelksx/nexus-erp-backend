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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            
            // Llaves foráneas a la Sucursal y al Producto
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            
            $table->integer('quantity')->default(0); // Cantidad actual
            $table->integer('min_alert')->default(5); // Alerta de stock bajo
            
            $table->timestamps();

            // Evitar duplicados: Un producto no puede estar registrado dos veces en la misma sucursal
            $table->unique(['branch_id', 'product_id']); 
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};

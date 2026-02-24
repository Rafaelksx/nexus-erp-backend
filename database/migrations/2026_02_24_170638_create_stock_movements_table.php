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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('inventory_id')->constrained()->cascadeOnDelete();
            // Nota: Más adelante agregaremos el 'user_id' cuando hagamos el sistema de Login.
            
            // Tipo de movimiento: 'in' (entrada), 'out' (venta/salida), 'transfer' (traslado), 'adjustment' (pérdida/daño)
            $table->enum('type', ['in', 'out', 'transfer', 'adjustment']); 
            
            $table->integer('quantity'); // Cuántos entraron o salieron (ej: 50 o -2)
            $table->string('notes')->nullable(); // Ej: "Venta #1024", "Mercancía dañada por agua"
            
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};

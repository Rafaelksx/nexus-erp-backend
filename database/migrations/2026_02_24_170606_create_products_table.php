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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Multi-tenant: El producto pertenece a una empresa específica
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            
            $table->string('sku')->index(); // Código interno (indexado para búsquedas rápidas)
            $table->string('barcode')->nullable(); // Código de barras
            $table->string('name');
            $table->decimal('base_price', 10, 2); // Precio con 2 decimales
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

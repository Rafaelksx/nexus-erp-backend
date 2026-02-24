<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
    {
        return [
            'sku' => strtoupper($this->faker->unique()->bothify('??-####')), // Genera algo como AB-1234
            'name' => $this->faker->words(3, true), // Tres palabras aleatorias
            'barcode' => $this->faker->ean13(), // Un código de barras válido
            'base_price' => $this->faker->randomFloat(2, 1, 100), // Precio entre 1 y 100 con 2 decimales
            // El company_id lo asignaremos en el Seeder
        ];
    }
}

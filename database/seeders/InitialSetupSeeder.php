<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Inventory;

class InitialSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Creamos una Empresa de prueba
        $company = \App\Models\Company::create([
            'name' => 'Nexus Retail Group',
            'tax_id' => 'J-99999999-0'
        ]);

        // 2. Le creamos 3 sucursales
        $company->branches()->createMany([
            ['name' => 'Sucursal Norte'],
            ['name' => 'Sucursal Sur'],
            ['name' => 'Sucursal Este'],
        ]);

        // 3. ¡La magia! Creamos 50 productos aleatorios asociados a esa empresa
        \App\Models\Product::factory()
            ->count(50)
            ->create(['company_id' => $company->id]);
    }
}

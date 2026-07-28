<?php

namespace Database\Seeders;

use App\Models\Cotizacion;
use Illuminate\Database\Seeder;

class CotizacionesSeeder extends Seeder
{
    public function run(): void
    {
        Cotizacion::factory()->count(10)->create();
    }
}

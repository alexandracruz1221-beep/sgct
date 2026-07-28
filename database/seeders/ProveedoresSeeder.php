<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class ProveedoresSeeder extends Seeder
{
    public function run(): void
    {
        if (Proveedor::count() === 0) {
            Proveedor::factory()->count(12)->create();
        } else {
            $this->command->info('Proveedores ya existentes — se omite creación.');
        }
    }
}

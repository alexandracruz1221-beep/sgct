<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialesSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure at least one category and unit exist
        if (Material::count() === 0) {
            Material::factory()->count(25)->create();
        } else {
            $this->command->info('Materiales ya existentes — se omite creación.');
        }
    }
}

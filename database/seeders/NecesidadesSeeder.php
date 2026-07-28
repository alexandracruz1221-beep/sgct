<?php

namespace Database\Seeders;

use App\Models\Necesidad;
use Illuminate\Database\Seeder;

class NecesidadesSeeder extends Seeder
{
    public function run(): void
    {
        if (Necesidad::count() === 0) {
            Necesidad::factory()->count(15)->create();
        } else {
            $this->command->info('Necesidades ya existentes — se omite creación.');
        }
    }
}

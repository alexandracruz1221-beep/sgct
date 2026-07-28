<?php

namespace Database\Seeders;

use App\Models\CentroEducativo;
use Illuminate\Database\Seeder;

class CentrosSeeder extends Seeder
{
    public function run(): void
    {
        if (CentroEducativo::count() === 0) {
            CentroEducativo::factory()->count(8)->create();
        } else {
            $this->command->info('Centros educativos ya existentes — se omite creación.');
        }
    }
}

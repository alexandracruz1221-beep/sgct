<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Seeder;

class PersonasSeeder extends Seeder
{
    public function run(): void
    {
        if (Persona::count() === 0) {
            Persona::factory()->count(30)->create();
        } else {
            $this->command->info('Personas ya existentes — se omite creación.');
        }
    }
}

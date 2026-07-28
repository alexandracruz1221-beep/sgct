<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(
            ['key' => 'admin'],
            ['nombre' => 'Administrador', 'descripcion' => 'Acceso total', 'estado' => 'activo']
        );

        $coordinadorRole = Role::firstOrCreate(
            ['key' => 'coordinador'],
            ['nombre' => 'Coordinador', 'descripcion' => 'Coordinación de centros', 'estado' => 'activo']
        );

        $viewerRole = Role::firstOrCreate(
            ['key' => 'viewer'],
            ['nombre' => 'Visor', 'descripcion' => 'Consultas básicas', 'estado' => 'activo']
        );

        User::firstOrCreate(
            ['email' => 'admin@sgct.local'],
            [
                'name' => 'Administrador SGCT',
                'password' => bcrypt('Admin12345*'),
                'role_id' => $adminRole->id,
                'estado' => 'activo',
            ]
        );

        User::firstOrCreate(
            ['email' => 'coordinador@sgct.test'],
            [
                'name' => 'Coordinador SGCT',
                'password' => bcrypt('password123'),
                'role_id' => $coordinadorRole->id,
                'estado' => 'activo',
            ]
        );

        // Call additional seeders for sample data
        $this->call([
            \Database\Seeders\CatalogosSeeder::class,
            \Database\Seeders\CentrosSeeder::class,
            \Database\Seeders\PersonasSeeder::class,
            \Database\Seeders\ProveedoresSeeder::class,
            \Database\Seeders\MaterialesSeeder::class,
            \Database\Seeders\NecesidadesSeeder::class,
            \Database\Seeders\CotizacionesSeeder::class,
        ]);
    }
}

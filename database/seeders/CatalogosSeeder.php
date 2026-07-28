<?php

namespace Database\Seeders;

use App\Models\CategoriaMaterial;
use App\Models\UnidadMedida;
use App\Models\TipoCentro;
use App\Models\Especialidad;
use Illuminate\Database\Seeder;

class CatalogosSeeder extends Seeder
{
    public function run(): void
    {
        CategoriaMaterial::firstOrCreate(['nombre' => 'Consumibles'], ['descripcion' => 'Materiales de uso diario', 'estado' => 'activo']);
        CategoriaMaterial::firstOrCreate(['nombre' => 'Equipos'], ['descripcion' => 'Equipos y herramientas', 'estado' => 'activo']);

        UnidadMedida::firstOrCreate(['nombre' => 'Unidad'], ['abreviatura' => 'u', 'estado' => 'activo']);
        UnidadMedida::firstOrCreate(['nombre' => 'Litro'], ['abreviatura' => 'L', 'estado' => 'activo']);
        
        // Tipos de centro
        TipoCentro::firstOrCreate(['nombre' => 'Colegio técnico'], ['descripcion' => 'Colegio técnico', 'estado' => 'activo']);
        TipoCentro::firstOrCreate(['nombre' => 'Escuela técnica'], ['descripcion' => 'Escuela técnica', 'estado' => 'activo']);
        TipoCentro::firstOrCreate(['nombre' => 'Escuela de enfermería'], ['descripcion' => 'Escuela de enfermería', 'estado' => 'activo']);

        // Especialidades
        Especialidad::firstOrCreate(['nombre' => 'Electricidad'], ['descripcion' => 'Especialidad en electricidad', 'estado' => 'activo']);
        Especialidad::firstOrCreate(['nombre' => 'Mecánica'], ['descripcion' => 'Especialidad en mecánica', 'estado' => 'activo']);
    }
}

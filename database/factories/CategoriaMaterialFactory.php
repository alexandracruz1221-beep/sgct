<?php

namespace Database\Factories;

use App\Models\CategoriaMaterial;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaMaterialFactory extends Factory
{
    protected $model = CategoriaMaterial::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'estado' => 'activo',
        ];
    }
}

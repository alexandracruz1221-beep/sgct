<?php

namespace Database\Factories;

use App\Models\UnidadMedida;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnidadMedidaFactory extends Factory
{
    protected $model = UnidadMedida::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'abreviatura' => strtoupper($this->faker->lexify('??')),
            'estado' => 'activo',
        ];
    }
}

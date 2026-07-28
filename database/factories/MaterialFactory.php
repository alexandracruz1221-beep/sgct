<?php

namespace Database\Factories;

use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    protected $model = Material::class;

    public function definition()
    {
        static $seq = 1;
        $codigo = 'MAT-' . str_pad($seq++, 4, '0', STR_PAD_LEFT);

        return [
            'codigo' => $codigo,
            'nombre' => ucfirst($this->faker->word),
            'descripcion' => $this->faker->sentence,
            'categoria_material_id' => 1,
            'unidad_medida_id' => 1,
            'requiere_vencimiento' => $this->faker->boolean(10),
            'stock_minimo' => $this->faker->randomFloat(2, 1, 50),
            'estado' => 'activo',
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}

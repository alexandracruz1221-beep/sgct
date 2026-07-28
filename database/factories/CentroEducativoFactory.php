<?php

namespace Database\Factories;

use App\Models\CentroEducativo;
use Illuminate\Database\Eloquent\Factories\Factory;

class CentroEducativoFactory extends Factory
{
    protected $model = CentroEducativo::class;

    public function definition()
    {
        static $seq = 1;
        $codigo = 'CET-' . str_pad($seq++, 4, '0', STR_PAD_LEFT);

        return [
            'codigo' => $codigo,
            'nombre' => $this->faker->company . ' - Centro',
            'tipo_centro_id' => 1,
            'departamento' => $this->faker->state,
            'municipio' => $this->faker->city,
            'aldea_o_barrio' => $this->faker->streetName,
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'correo' => $this->faker->companyEmail,
            'nombre_responsable' => $this->faker->name,
            'telefono_responsable' => $this->faker->phoneNumber,
            'estado' => 'activo',
            'observaciones' => null,
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}

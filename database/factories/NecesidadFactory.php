<?php

namespace Database\Factories;

use App\Models\Necesidad;
use Illuminate\Database\Eloquent\Factories\Factory;

class NecesidadFactory extends Factory
{
    protected $model = Necesidad::class;

    public function definition()
    {
        static $seq = 1;
        $codigo = 'NEC-' . str_pad($seq++, 4, '0', STR_PAD_LEFT);

        return [
            'codigo' => $codigo,
            'centro_educativo_id' => 1,
            'solicitante_usuario_id' => 1,
            'fecha_solicitud' => $this->faker->date(),
            'prioridad' => $this->faker->randomElement(['baja','media','alta','urgente']),
            'estado' => $this->faker->randomElement(['borrador','enviada','aprobada','rechazada','atendida','cancelada']),
            'justificacion' => $this->faker->sentence,
            'observaciones' => null,
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}

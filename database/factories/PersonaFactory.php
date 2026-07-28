<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    protected $model = Persona::class;

    public function definition()
    {
        static $seq = 1;
        $codigo = 'PER-' . str_pad($seq++, 4, '0', STR_PAD_LEFT);

        return [
            'codigo' => $codigo,
            'nombres' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'identidad' => null,
            'telefono' => $this->faker->phoneNumber,
            'correo' => $this->faker->safeEmail,
            'direccion' => $this->faker->address,
                'tipo_personal' => $this->faker->randomElement(['docente','instructor','tecnico','mano_obra','administrativo']),
            'especialidad_id' => null,
            'disponibilidad' => $this->faker->randomElement(['disponible','asignado','inactivo']),
            'estado' => 'activo',
            'observaciones' => null,
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}

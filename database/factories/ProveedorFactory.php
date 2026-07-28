<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    protected $model = Proveedor::class;

    public function definition()
    {
        static $seq = 1;
        $codigo = 'PRO-' . str_pad($seq++, 4, '0', STR_PAD_LEFT);

        return [
            'codigo' => $codigo,
            'tipo_proveedor' => 'empresa',
            'nombre_comercial' => $this->faker->company,
            'razon_social' => $this->faker->company . ' SA',
            'rtn' => $this->faker->numerify('0801-####-#####'),
            'nombre_contacto' => $this->faker->name,
            'telefono' => $this->faker->phoneNumber,
            'telefono_secundario' => null,
            'correo' => $this->faker->companyEmail,
            'departamento' => $this->faker->state,
            'municipio' => $this->faker->city,
            'direccion' => $this->faker->address,
            'rubro' => $this->faker->word,
            'estado_rtn' => 'validado',
            'estado' => 'activo',
            'observaciones' => null,
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}

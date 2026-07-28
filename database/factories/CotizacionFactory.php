<?php

namespace Database\Factories;

use App\Models\Cotizacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class CotizacionFactory extends Factory
{
    protected $model = Cotizacion::class;

    public function definition()
    {
        static $seq = 1;
        $codigo = 'COT-' . str_pad($seq++, 4, '0', STR_PAD_LEFT);

        $subtotal = $this->faker->randomFloat(2, 100, 5000);
        $impuesto = round($subtotal * 0.15, 2);
        $total = $subtotal + $impuesto;

        return [
            'codigo' => $codigo,
            'necesidad_id' => 1,
            'proveedor_id' => 1,
            'fecha_cotizacion' => $this->faker->date(),
            'fecha_vencimiento' => $this->faker->dateTimeBetween('now','+30 days'),
            'subtotal' => $subtotal,
            'impuesto' => $impuesto,
            'total' => $total,
            'estado' => 'pendiente',
            'archivo_cotizacion' => null,
            'observaciones' => null,
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}

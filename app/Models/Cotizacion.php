<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones';

    protected $fillable = [
        'codigo',
        'necesidad_id',
        'proveedor_id',
        'fecha_cotizacion',
        'fecha_vencimiento',
        'subtotal',
        'impuesto',
        'total',
        'estado',
        'archivo_cotizacion',
        'observaciones',
        'aprobado_por',
        'fecha_aprobacion',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'fecha_cotizacion' => 'date',
        'fecha_vencimiento' => 'date',
        'subtotal' => 'decimal:2',
        'impuesto' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function necesidad()
    {
        return $this->belongsTo(Necesidad::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function detalles()
    {
        return $this->hasMany(CotizacionDetalle::class);
    }

    public function aprobadoPor()
    {
        return $this->belongsTo(User::class, 'aprobado_por');
    }
}

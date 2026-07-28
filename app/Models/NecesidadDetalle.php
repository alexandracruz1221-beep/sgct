<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NecesidadDetalle extends Model
{
    use HasFactory;

    protected $fillable = [
        'necesidad_id',
        'material_id',
        'descripcion_material',
        'cantidad_solicitada',
        'cantidad_aprobada',
        'observaciones',
    ];

    protected $casts = [
        'cantidad_solicitada' => 'decimal:2',
        'cantidad_aprobada' => 'decimal:2',
    ];

    public function necesidad()
    {
        return $this->belongsTo(Necesidad::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}

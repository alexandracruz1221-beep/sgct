<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
        'centro_educativo_id',
        'ubicacion_tipo',
        'cantidad_disponible',
        'fecha_vencimiento',
        'lote',
        'estado',
        'observaciones',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'cantidad_disponible' => 'decimal:2',
        'fecha_vencimiento' => 'date',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function centroEducativo()
    {
        return $this->belongsTo(CentroEducativo::class);
    }

    public function movimientosOrigen()
    {
        return $this->hasMany(MovimientoInventario::class, 'inventario_origen_id');
    }

    public function movimientosDestino()
    {
        return $this->hasMany(MovimientoInventario::class, 'inventario_destino_id');
    }
}

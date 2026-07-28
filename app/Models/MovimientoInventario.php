<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoInventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'material_id',
        'inventario_origen_id',
        'inventario_destino_id',
        'centro_origen_id',
        'centro_destino_id',
        'tipo_movimiento',
        'cantidad',
        'fecha_movimiento',
        'motivo',
        'referencia_documento',
        'responsable',
        'observaciones',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'cantidad' => 'decimal:2',
        'fecha_movimiento' => 'date',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function inventarioOrigen()
    {
        return $this->belongsTo(Inventario::class, 'inventario_origen_id');
    }

    public function inventarioDestino()
    {
        return $this->belongsTo(Inventario::class, 'inventario_destino_id');
    }

    public function centroOrigen()
    {
        return $this->belongsTo(CentroEducativo::class, 'centro_origen_id');
    }

    public function centroDestino()
    {
        return $this->belongsTo(CentroEducativo::class, 'centro_destino_id');
    }
}

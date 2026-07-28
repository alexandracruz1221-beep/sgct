<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Necesidad extends Model
{
    use HasFactory;

    protected $table = 'necesidades';

    protected $fillable = [
        'codigo',
        'centro_educativo_id',
        'solicitante_usuario_id',
        'fecha_solicitud',
        'prioridad',
        'estado',
        'justificacion',
        'observaciones',
        'aprobado_por',
        'fecha_aprobacion',
        'motivo_rechazo',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'fecha_solicitud' => 'date',
        'fecha_aprobacion' => 'date',
    ];

    public function centroEducativo()
    {
        return $this->belongsTo(CentroEducativo::class);
    }

    public function solicitanteUsuario()
    {
        return $this->belongsTo(User::class, 'solicitante_usuario_id');
    }

    public function aprobadoPor()
    {
        return $this->belongsTo(User::class, 'aprobado_por');
    }

    public function detalles()
    {
        return $this->hasMany(NecesidadDetalle::class);
    }

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class);
    }

    public function historial()
    {
        return $this->hasMany(NecesidadHistorial::class);
    }
}

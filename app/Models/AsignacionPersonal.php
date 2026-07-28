<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionPersonal extends Model
{
    use HasFactory;

    protected $table = 'asignaciones_personal';

    protected $fillable = [
        'persona_id',
        'centro_educativo_id',
        'cargo_o_funcion',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'observaciones',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function centroEducativo()
    {
        return $this->belongsTo(CentroEducativo::class);
    }
}

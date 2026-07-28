<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'codigo',
        'nombres',
        'apellidos',
        'identidad',
        'telefono',
        'correo',
        'direccion',
        'tipo_personal',
        'especialidad_id',
        'disponibilidad',
        'estado',
        'observaciones',
        'created_by',
        'updated_by',
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }

    public function asignaciones()
    {
        return $this->hasMany(AsignacionPersonal::class);
    }
}

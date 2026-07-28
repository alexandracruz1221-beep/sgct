<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CentroEducativo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'codigo',
        'nombre',
        'tipo_centro_id',
        'departamento',
        'municipio',
        'aldea_o_barrio',
        'direccion',
        'telefono',
        'correo',
        'nombre_responsable',
        'telefono_responsable',
        'estado',
        'observaciones',
        'created_by',
        'updated_by',
    ];

    public function tipoCentro()
    {
        return $this->belongsTo(TipoCentro::class);
    }

    public function asignacionesPersonal()
    {
        return $this->hasMany(AsignacionPersonal::class);
    }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class);
    }

    public function necesidades()
    {
        return $this->hasMany(Necesidad::class);
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'usuario_centros');
    }
}

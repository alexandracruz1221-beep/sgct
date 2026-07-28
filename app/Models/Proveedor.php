<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'proveedores';

    protected $fillable = [
        'codigo',
        'tipo_proveedor',
        'nombre_comercial',
        'razon_social',
        'rtn',
        'nombre_contacto',
        'telefono',
        'telefono_secundario',
        'correo',
        'departamento',
        'municipio',
        'direccion',
        'rubro',
        'estado_rtn',
        'estado',
        'observaciones',
        'created_by',
        'updated_by',
    ];

    public function documentos()
    {
        return $this->hasMany(ProveedorDocumento::class);
    }

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class);
    }
}

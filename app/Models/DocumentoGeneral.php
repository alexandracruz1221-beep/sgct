<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoGeneral extends Model
{
    use HasFactory;

    protected $fillable = [
        'entidad_tipo',
        'entidad_id',
        'nombre_documento',
        'archivo',
        'tipo_archivo',
        'observaciones',
        'created_by',
    ];
}

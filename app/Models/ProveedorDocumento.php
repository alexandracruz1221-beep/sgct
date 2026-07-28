<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProveedorDocumento extends Model
{
    use HasFactory;

    protected $fillable = [
        'proveedor_id',
        'nombre_documento',
        'archivo',
        'fecha_documento',
        'observaciones',
        'created_by',
    ];

    protected $casts = [
        'fecha_documento' => 'date',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCentro extends Model
{
    use HasFactory;

    protected $table = 'tipo_centros';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];

    public function centrosEducativos()
    {
        return $this->hasMany(CentroEducativo::class);
    }
}

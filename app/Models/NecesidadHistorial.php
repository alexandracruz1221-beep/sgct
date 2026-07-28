<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NecesidadHistorial extends Model
{
    use HasFactory;

    protected $table = 'necesidad_historial';
    public $timestamps = false;

    protected $fillable = [
        'necesidad_id',
        'estado_anterior',
        'estado_nuevo',
        'comentario',
        'usuario_id',
        'created_at',
    ];

    public function necesidad()
    {
        return $this->belongsTo(Necesidad::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}

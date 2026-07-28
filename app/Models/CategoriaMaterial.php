<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaMaterial extends Model
{
    use HasFactory;

    protected $table = 'categorias_materiales';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];

    public function materiales()
    {
        return $this->hasMany(Material::class);
    }
}

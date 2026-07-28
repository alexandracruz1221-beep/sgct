<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'materiales';

    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'categoria_material_id',
        'unidad_medida_id',
        'requiere_vencimiento',
        'stock_minimo',
        'estado',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'requiere_vencimiento' => 'boolean',
        'stock_minimo' => 'decimal:2',
    ];

    public function categoriaMaterial()
    {
        return $this->belongsTo(CategoriaMaterial::class);
    }

    public function unidadMedida()
    {
        return $this->belongsTo(UnidadMedida::class);
    }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class);
    }

    public function movimientosInventario()
    {
        return $this->hasMany(MovimientoInventario::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoUnidad extends Model
{
    use HasFactory;

    protected $table = 'producto_unidad';
    protected $fillable = [
        'id_producto', 'id_unidad_derivada',
        'factor',
        'pcompra',
        'porcentajeVenta',
        'ppublico',
        'pespecial',
        'pminimo',
        'pultimo',
        'comision',
        'ganancia',
        'comision2',
        'comision3',
        'comision4',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function unidadDerivada()
    {
        return $this->belongsTo(UnidadDerivada::class, 'id_unidad_derivada');
    }
}

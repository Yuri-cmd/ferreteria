<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadDerivada extends Model
{
    use HasFactory;

    protected $table = 'unidad_derivada';
    protected $fillable = ['id_unidad', 'nombre', 'factor'];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'id_unidad');
    }
}

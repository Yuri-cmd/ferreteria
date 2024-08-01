<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected $table = 'unidad';
    protected $fillable = ['nombre', 'factor'];

    public function derivadas()
    {
        return $this->hasMany(UnidadDerivada::class, 'id_unidad');
    }
}

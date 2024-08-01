<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'descripcion',
        'ticket_description',
        'codigo',
        'barcode',
        'brand',
        'id_medida',
        'id_categoria',
        'location',
        'id_moneda',
        'precio',
        'costo',
        'cantidad',
        'codsunat',
        'peso',
        'iscbp',
        'technical_sheet',
        'batch_number',
        'expiration_date',
        'technical_action',
        'image',
        'min_stock',
    ];
}

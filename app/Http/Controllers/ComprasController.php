<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    public function index()
    {
        return view('almacen.compras');
    }

    public function comprasAll()
    {
        $data = DB::select('SELECT c.id_compra,c.fecha_emision,c.fecha_vencimiento,c.serie,c.numero,p.razon_social 
        FROM compras AS c LEFT JOIN proveedores AS p ON
        c.id_proveedor=p.proveedor_id');
        return response()->json($data);
    }

    public function show(Request $request)
    {
        $data = DB::select("SELECT pc.id_compra,p.descripcion,pc.cantidad,pc.precio, c.total as totalTotal FROM productos_compras AS pc LEFT JOIN productos AS p ON
        pc.id_producto=p.id_producto LEFT JOIN compras AS c ON
        pc.id_compra=c.id_compra WHERE c.id_compra = {$request->id}");
        return response()->json($data);
    }
}

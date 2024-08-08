<?php

namespace App\Http\Controllers;

use App\Models\ProductoUnidad;
use Illuminate\Http\Request;

class ProductoUnidadController extends Controller
{
    public function delete(Request $request)
    {
        $productoUnidad = ProductoUnidad::find($request->id);
        if ($productoUnidad) {
            $productoUnidad->delete();
        }
    }

    public function update(Request $request)
    {
        $productoUnidad = ProductoUnidad::find($request->id);
        $productoUnidad->id_unidad_derivada = $request->columna0;
        $productoUnidad->factor = $request->columna1;
        $productoUnidad->pcompra = $request->columna2;
        $productoUnidad->porcentajeVenta = $request->columna3;
        $productoUnidad->ppublico = $request->columna4;
        $productoUnidad->pespecial = $request->columna5;
        $productoUnidad->pminimo = $request->columna6;
        $productoUnidad->pultimo = $request->columna7;
        $productoUnidad->comision = $request->columna8;
        $productoUnidad->ganancia = $request->columna9;
        $productoUnidad->comision2 = $request->columna10;
        $productoUnidad->comision3 = $request->columna11;
        $productoUnidad->comision4 = $request->columna12;
        $productoUnidad->save();
    }
}

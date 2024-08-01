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
}

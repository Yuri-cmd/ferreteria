<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria = CategoriaProducto::create([
            'nombre' => strtoupper($request->input('nombre')),
        ]);

        return response()->json($categoria);
    }
    
}

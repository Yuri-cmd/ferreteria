<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria = Sucursal::create([
            'nombre' => $request->input('nombre'),
        ]);

        return response()->json($categoria);
    }
}

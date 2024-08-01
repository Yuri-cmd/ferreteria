<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $ubicacion = Ubicacion::create([
            'nombre' => $request->input('nombre'),
        ]);

        return response()->json($ubicacion);
    }
}

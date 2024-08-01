<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;

class UnidadMedidaController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Crear y guardar la nueva unidad de medida
        $unidad = Unidad::create([
            'nombre' => $request->input('nombre'),
        ]);
        // Redireccionar con un mensaje de éxito
        return response()->json($unidad);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use App\Models\UnidadMedida;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UnidadMedidaController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $validatedData = $request->validate([
                'nombre' => 'required|string|max:255',
            ]);

            // Crear y guardar la nueva unidad de medida
            $unidad = Unidad::create([
                'nombre' => strtoupper($request->input('nombre')),
            ]);
            // Redireccionar con un mensaje de éxito
            return response()->json($unidad, 200);
        } catch (QueryException $e) {
            $errorMessage = $e->getMessage();
            if (strpos($errorMessage, "for key 'nombre'") !== false) {
                $customMessage = 'Error: El nombre ya existe.';
            } else {
                $customMessage = 'Error al guardar: ' . $errorMessage;
            }

            // Redirigir con un mensaje de error
            return response()->json(['success' => false, 'errors' => ['error' => [$customMessage]]]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
            ]);
    
            $ubicacion = Ubicacion::create([
                'nombre' => strtoupper($request->input('nombre')),
            ]);
        
            return response()->json($ubicacion, 200);
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

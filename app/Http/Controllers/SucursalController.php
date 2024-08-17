<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|max:255',
            ]);

            $sucursal = Sucursal::create([
                'nombre' => strtoupper($request->input('nombre')),
            ]);
            // Redireccionar con un mensaje de éxito
            return response()->json($sucursal, 200);
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

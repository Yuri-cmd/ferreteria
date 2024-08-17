<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use App\Models\UnidadDerivada;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    public function getUnidadesDerivadas(Request $request)
    {
        $idUnidad = $request->input('id_unidad');
        $unidadesDerivadas = UnidadDerivada::where('id_unidad', $idUnidad)->get();

        return response()->json($unidadesDerivadas);
    }

    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|max:255',
            ]);

            $unidad = UnidadDerivada::create([
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

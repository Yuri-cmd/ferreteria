<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use App\Models\UnidadDerivada;
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
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $ubicacion = UnidadDerivada::create([
            'id_unidad' => $request->input('id_unidad'),
            'nombre' => $request->input('nombre'),
            'factor' => $request->input('factor'),
        ]);

        return response()->json($ubicacion);
    }
}

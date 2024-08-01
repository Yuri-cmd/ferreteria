<?php

namespace App\Http\Controllers;

use App\Models\HistorialMovimiento;
use Illuminate\Http\Request;

class HistorialMovimientoController extends Controller
{
    public function show(Request $request)
    {
        $historial = HistorialMovimiento::find($request->cod);
        return response()->json($historial);
    }
}

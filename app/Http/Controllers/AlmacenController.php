<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use App\Models\Marca;
use App\Models\Ubicacion;
use App\Models\Unidad;
use App\Models\UnidadDerivada;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlmacenController extends Controller
{
    public function index()
    {
        $productos = DB::select('SELECT
                                pr.*,
                                um.nombre unidad_nombre 
                            FROM
                                productos pr
                                LEFT JOIN unidad um ON pr.id_medida = um.id 
                            ');
        $unidades = Unidad::all();
        $categorias = CategoriaProducto::all();
        $ubicacion = Ubicacion::all();
        $ubicaciones = Ubicacion::all();
        $unidadesDerivadas = UnidadDerivada::all();
        $marcas = Marca::all();
        return view('almacen.index', compact('productos', 'unidades', 'categorias', 'ubicacion', 'ubicaciones', 'unidadesDerivadas', 'marcas'));
    }
}

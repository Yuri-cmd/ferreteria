<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use App\Models\Marca;
use App\Models\Sucursal;
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
                                    um.nombre unidad_nombre,
                                    p.ppublico,
                                    p.pcompra 
                                FROM
                                    productos pr
                                    LEFT JOIN unidad um ON pr.id_medida = um.id
                                    LEFT JOIN producto_unidad p on p.id_producto = pr.id_producto
                                GROUP BY
                                    pr.id_producto');
        $unidades = Unidad::orderBy('nombre', 'asc')->get();
        $categorias = CategoriaProducto::orderBy('nombre', 'asc')->get();
        $ubicacion = Ubicacion::orderBy('nombre', 'asc')->get();
        $ubicaciones = Ubicacion::orderBy('nombre', 'asc')->get();
        $unidadesDerivadas = UnidadDerivada::orderBy('nombre', 'asc')->get();
        $marcas = Marca::orderBy('nombre', 'asc')->get();
        $sucursales = Sucursal::orderBy('nombre', 'asc')->get();
        return view('almacen.index', compact('productos', 'unidades', 'categorias', 'ubicacion', 'ubicaciones', 'unidadesDerivadas', 'marcas', 'sucursales'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\ProductoUnidad;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{

    public function store(Request $request)
    {
        // Guardar el producto
        $producto = Producto::create($request->except(['technical_sheet', 'image', 'costos']));

        // Procesar y guardar archivos si existen
        if ($request->hasFile('technical_sheet')) {
            $producto->technical_sheet = $request->file('technical_sheet')->store('technical_sheets', 'custom_public');
        }

        if ($request->hasFile('image')) {
            $producto->image = $request->file('image')->store('images', 'custom_public');
        }

        $producto->save();

        // Guardar datos en producto_unidad
        $costos = $request->input('costos', []);
        if (is_string($costos)) {
            $costos = json_decode($costos, true);
        }

        foreach ($costos as $costo) {
            ProductoUnidad::create([
                'id_producto' => $producto->id_producto,
                'id_unidad_derivada' => $costo['unidadId'],
                'factor' => $costo['factor'],
                'pcompra' => $costo['pcompra'],
                'porcentajeVenta' => $costo['porcentajeVenta'],
                'ppublico' => $costo['ppublico'],
                'pespecial' => $costo['pespecial'],
                'pminimo' => $costo['pminimo'],
                'pultimo' => $costo['pultimo'],
                'comision' => $costo['comision'],
                'ganancia' => $costo['ganancia'],
                'comision2' => $costo['comision2'],
                'comision3' => $costo['comision3'],
                'comision4' => $costo['comision4'],
            ]);
        }
        return redirect()->back()->with('success', 'Producto guardado con éxito');
    }

    /**
     * Actualiza un producto existente.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:productos,id_producto',
            'descripcion' => 'required|string',
            'ticket_description' => 'nullable|string',
            'codigo' => 'required|string',
            'barcode' => 'nullable|string',
            'brand' => 'nullable|string',
            'id_medida' => 'required|integer',
            'id_categoria' => 'required|integer',
            'location' => 'nullable|integer',
            'precio' => 'nullable|numeric',
            'costo' => 'nullable|numeric',
            'cantidad' => 'required|numeric',
            'codsunat' => 'nullable|string',
            'peso' => 'nullable|numeric',
            'iscbp' => 'required|boolean',
            'technical_sheet' => 'nullable|file|mimes:pdf,doc,docx',
            'batch_number' => 'nullable|string',
            'expiration_date' => 'nullable|date',
            'technical_action' => 'nullable|string',
            'imagen' => 'nullable|file|image',
            'min_stock' => 'nullable|numeric',
            'unidad_derivada' => 'nullable|array',
            'costos' => 'nullable|string'
        ]);

        // Encontrar el producto por ID
        $producto = Producto::find($validatedData['id']);

        if (!$producto) {
            return response()->json(['success' => false, 'message' => 'Producto no encontrado.'], 404);
        }

        // Actualizar los datos del producto
        $producto->descripcion = $validatedData['descripcion'];
        $producto->ticket_description = $validatedData['ticket_description'];
        $producto->codigo = $validatedData['codigo'];
        $producto->barcode = $validatedData['barcode'];
        $producto->brand = $validatedData['brand'];
        $producto->id_medida = $validatedData['id_medida'];
        $producto->id_categoria = $validatedData['id_categoria'];
        $producto->location = $validatedData['location'];
        $producto->id_moneda = $validatedData['id_moneda'] ?? null;
        $producto->precio = $validatedData['precio'] ?? null;
        $producto->costo = $validatedData['costo'] ?? null;
        $producto->cantidad = $validatedData['cantidad'];
        $producto->codsunat = $validatedData['codsunat'];
        $producto->peso = $validatedData['peso'];
        $producto->iscbp = $validatedData['iscbp'];
        $producto->batch_number = $validatedData['batch_number'];
        $producto->expiration_date = $validatedData['expiration_date'];
        $producto->technical_action = $validatedData['technical_action'];
        $producto->min_stock = $validatedData['min_stock'];

        // Manejar la subida de la imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen antigua si existe
            if ($producto->image) {
                Storage::disk('public')->delete($producto->image);
            }

            // Subir la nueva imagen
            $imagePath = $request->file('imagen')->store('images', 'custom_public');
            $producto->image = $imagePath;
        }

        // Manejar la subida de la ficha técnica
        if ($request->hasFile('technical_sheet')) {
            $technicalSheetPath = $request->file('technical_sheet')->store('technical_sheets', 'custom_public');
            $producto->technical_sheet = $technicalSheetPath;
        }

        // Guardar los cambios del producto
        $producto->save();

        // Actualizar las unidades derivadas
        if ($request->has('costos') && $request->input('costos')) {
            $costos = json_decode($request->input('costos'), true);
            foreach ($costos as $costo) {
                ProductoUnidad::create([
                    'id_producto' => $producto->id_producto,
                    'id_unidad_derivada' => $costo['id'],
                    'costo' => $costo['costo'],
                ]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Producto actualizado correctamente.']);
    }

    public function show(Request $request)
    {
        // Encontrar el producto por su ID
        $producto = Producto::find($request->productoId);
        $unidad = DB::select('SELECT
            producto_unidad.*,
            unidad_derivada.nombre,
            unidad_derivada.factor 
        FROM
            producto_unidad
            INNER JOIN unidad_derivada ON unidad_derivada.id = producto_unidad.id_unidad_derivada 
        WHERE
            id_producto = ?', [$request->productoId]);
        // Verificar si el producto existe
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        // Devolver los datos del producto como JSON
        return response()->json(['producto' => $producto, 'unidad' => $unidad]);
    }

    public function generarCodigo()
    {
        // Obtener el último producto
        $ultimoProducto = Producto::orderBy('id_producto', 'desc')->first();
        $ultimoCodigo = $ultimoProducto ? $ultimoProducto->codigo : '000000';

        // Incrementar el último código
        $nuevoCodigo = str_pad((int)$ultimoCodigo + 1, 6, '0', STR_PAD_LEFT);

        return response()->json(['codigo' => $nuevoCodigo]);
    }

    public function clonar(Request $request)
    {
        $ids = $request->input('ids', []);
        $cloned = 0;

        foreach ($ids as $id) {
            $producto = Producto::find($id);
            if ($producto) {
                // Generar un nuevo código único
                $ultimoCodigo = Producto::orderBy('codigo', 'desc')->first()->codigo;
                $nuevoCodigo = str_pad(intval($ultimoCodigo) + 1, 6, '0', STR_PAD_LEFT);

                // Clonar el registro
                $nuevoProducto = $producto->replicate();
                $nuevoProducto->codigo = $nuevoCodigo; // Asigna el nuevo código
                $nuevoProducto->save();

                $cloned++;
                // Clonar las unidades relacionadas
                $productoUnidades = ProductoUnidad::where('id_producto', $id)->get();
                foreach ($productoUnidades as $productoUnidad) {
                    $nuevaUnidad = $productoUnidad->replicate();
                    $nuevaUnidad->id_producto = $nuevoProducto->id_producto; // Asocia la nueva unidad con el nuevo producto
                    $nuevaUnidad->save();
                }
            }
        }

        if ($cloned > 0) {
            return response()->json(['success' => true, 'message' => "$cloned productos clonados."]);
        } else {
            return response()->json(['success' => false, 'message' => 'No se clonó ningún producto.']);
        }
    }

    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $activo = $request->input('activo');

        $producto = Producto::find($id);
        if ($producto) {
            $producto->estado = $activo;
            $producto->save();

            return response()->json(['success' => true, 'message' => 'Estado actualizado']);
        }

        return response()->json(['success' => false, 'message' => 'Producto no encontrado']);
    }
}

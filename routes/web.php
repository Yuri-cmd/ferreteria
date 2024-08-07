<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistorialMovimientoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoUnidadController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\UnidadMedidaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('inicio', [AuthController::class, 'login'])->name('inicio');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('reset-password', [AuthController::class, 'resetPass'])->name('resetPass');
Route::post('change-pass', [AuthController::class, 'validarUsuario'])->name('validarUsuario');
Route::post('savePass', [AuthController::class, 'savePass'])->name('savePass');
Route::middleware(['auth.custom'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/almacen/inventario', [AlmacenController::class, 'index'])->name('almacen');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/productos/generarCodigo', [ProductoController::class, 'generarCodigo'])->name('productos.generarCodigo');
    Route::post('/unidad-medida', [UnidadMedidaController::class, 'store'])->name('unidad-medida.store');
    Route::post('/productos/update', [ProductoController::class, 'update'])->name('productos.update');
    Route::post('/productos/show', [ProductoController::class, 'show'])->name('productos.show');
    Route::post('/historial/show', [HistorialMovimientoController::class, 'show'])->name('historial.show');
    Route::get('/almacen/compras', [ComprasController::class, 'index'])->name('compras');
    Route::post('/almacen/compras/comprasAll', [ComprasController::class, 'comprasAll'])->name('comprasAll');
    Route::post('/almacen/compras/show', [ComprasController::class, 'show'])->name('compras.show');
    Route::post('/unidades-derivadas', [UnidadController::class, 'getUnidadesDerivadas'])->name('getUnidadesDerivadas');
    Route::post('/unidades-derivadas-store', [UnidadController::class, 'store'])->name('unidadDerivada.store');
    Route::post('/ubicaciones', [UbicacionController::class, 'store'])->name('ubicacion.store');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::post('/marcas', [MarcaController::class, 'store'])->name('marca.store');
    Route::post('/delete/unidad-derivada', [ProductoUnidadController::class, 'delete'])->name('productounidad.delete');
    Route::post('/productos/clonar', [ProductoController::class, 'clonar'])->name('productos.clonar');
    Route::post('/productos/updateStatus', [ProductoController::class, 'updateStatus'])->name('productos.updateStatus');

});

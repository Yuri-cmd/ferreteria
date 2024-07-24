<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
});

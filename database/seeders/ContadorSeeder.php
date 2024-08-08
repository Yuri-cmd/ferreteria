<?php

namespace Database\Seeders;

use App\Models\Contador;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener el código más alto de los productos existentes
        $codigoMaximo = Producto::max('codigo');

        // Convertir a entero, asegurándose de que el código sea numérico
        $codigoMaximoNumero = ctype_digit($codigoMaximo) ? intval($codigoMaximo) : 0;

        // Establecer el valor inicial del contador
        Contador::updateOrCreate(
            ['nombre' => 'producto_codigo'],
            ['valor' => $codigoMaximoNumero]
        );
    }
}

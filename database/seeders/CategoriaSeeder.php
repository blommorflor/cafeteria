<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(["nombre" => "Mecato"]);
        Categoria::create(["nombre" => "Bebida caliente"]);
        Categoria::create(["nombre" => "Bebida fria"]);
        Categoria::create(["nombre" => "Dulce"]);
        Categoria::create(["nombre" => "Salado"]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Articulo;
use App\Models\Comentario;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Articulo::factory(10)->create()->each(function ($articulo) {
            Comentario::factory(5)->create([
                'id_articulo' => $articulo->id,
            ]);
        });
    }
}

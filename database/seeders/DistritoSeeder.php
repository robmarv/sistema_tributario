<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistritoSeeder extends Seeder
{
    public function run()
    {
        DB::table('distritos')->insert([
            ['nombre' => 'Conchagua', 'estado' => 1],
            ['nombre' => 'El Carmen', 'estado' => 1],
            ['nombre' => 'Intipucá', 'estado' => 1],
            ['nombre' => 'La Unión', 'estado' => 1],
            ['nombre' => 'Meanguera del Golfo', 'estado' => 1],
            ['nombre' => 'San Alejo', 'estado' => 1],
            ['nombre' => 'Yayantique', 'estado' => 1],
            ['nombre' => 'Yucuaiquín', 'estado' => 1],
        ]);
    }
}

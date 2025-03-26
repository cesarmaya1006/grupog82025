<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Slider extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('slider')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        // ===================================================================================
        $datas = [
            ['foto' => 'image5.jpg','titulo' => 'BIENVENIDOS AL GRUPO G8'],
            ['foto' => 'image4.jpg','titulo' => 'ASOCIADOS AL GRUPO G8'],
            ['foto' => 'image1.jpg','titulo' => 'Sistema de Gestión de Proveedores'],

        ];
        // ===================================================================================
        foreach ($datas as $data) {
            DB::table('slider')->insert([
                'foto' => $data['foto'],
                'titulo' => $data['titulo'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}

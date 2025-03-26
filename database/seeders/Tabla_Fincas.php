<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Fincas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('fincas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        // ===================================================================================
        $datas = [
            ['nombre' => 'Agricola Circasia S.A.S','logo' => 'logo-circasia.jpg','url' => 'https://www.circasia.com/'],
            ['nombre' => 'Agromonte S.A.','logo' => 'logo-agromonte.jpg','url' => 'https://www.agromonte-sa.com/'],
            ['nombre' => 'Rosas Agua Clara','logo' => 'logo-agua-clara.jpg','url' => 'http://matinaflowers.com'],
            ['nombre' => 'Andalucia','logo' => 'logo-andalucia.jpg','url' => 'http://andalucia-sa.com'],
            ['nombre' => 'Aposentos Flowers','logo' => 'logo-aposentos.jpg','url' => 'https://aposentos.com.co/'],
            ['nombre' => 'Ayura','logo' => 'logo-ayura.png','url' => 'http://eclipseflowers.com.co'],
            ['nombre' => 'Colibri Flowers','logo' => 'logo-colibri.jpg','url' => 'http://www.colibriflowers.com/'],
            ['nombre' => 'Don Eusebio','logo' => 'logo-don-eusebio.jpg','url' => 'http://www.doneusebio.com/'],
            ['nombre' => 'Flores del Gallinero','logo' => 'logo-gallinero.jpg','url' => null],
            ['nombre' => 'Inverpalmas','logo' => 'logo-inverpalmas.jpg','url' => 'http://www.inverpalmas.com/'],
            ['nombre' => 'Luisiana Farms','logo' => 'logo-lusiana.png','url' => 'http://www.luisianafarms.com/'],
            ['nombre' => 'La Plazoleta','logo' => 'logo-plazoleta.png','url' => 'http://www.laplazoleta.com/'],
            ['nombre' => 'Flores de Serrezuela S.A.S.','logo' => 'logo-serrenzuela.jpg','url' => 'http://www.serrezuelaflowers.com.co'],
            ['nombre' => 'Flowers of Colombia','logo' => 'Flowers-of-Colombia-Logo.png','url' => null],
            ['nombre' => 'Aurora','logo' => 'logo_aurora.png','url' => 'https://www.floresaurora.com/'],
            ['nombre' => 'Turflor','logo' => 'logo-tuflor.jpg','url' => 'http://www.turflor.com'],
            ['nombre' => 'Vegaflor','logo' => 'Logo-Vegaflor-white.png','url' => 'http://www.vegaflor.com'],

        ];
        // ===================================================================================
        foreach ($datas as $data) {
            DB::table('fincas')->insert([
                'nombre' => $data['nombre'],
                'logo' => $data['logo'],
                'url' => $data['url'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}



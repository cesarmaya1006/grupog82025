<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            Tabla_TipoDocu::class,
            TablaRoles::class,
            TablaUser::class,
            Tabla_Slider::class,
            Tabla_Fincas::class,
            TablaParametros::class,
            TablaMenuSeeder::class,

        ]);
    }
}

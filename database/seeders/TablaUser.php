<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');


        $usuario1 = User::create([
            'tipo_documento_id' => 1,
            'identificacion' => '79984883',
            'nombres' => 'Cesar',
            'apellidos' => 'Maya',
            'name' => 'Cesar Maya',
            'email' => 'cesarmaya1006@gmail.com',
            'genero' => 'M',
            'fecha_nacimiento' => '1978/05/22',
            'telefono' => '3004135515',
            'password' => bcrypt('123456789')
        ])->syncRoles(['Administrador Sistema']);
        // + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + +
        User::create([
            'tipo_documento_id' => 1,
            'identificacion' => '11111111',
            'nombres' => 'Luis Gabriel',
            'apellidos' => 'Lleras',
            'name' => 'Luis Lleras',
            'email' => 'luisgabriel.lleras@gmail.com',
            'genero' => 'M',
            'fecha_nacimiento' => '1973/03/28',
            'telefono' => '3114188912',
            'password' => bcrypt('123456789')
        ])->syncRoles('Administrador');
        User::create([
            'tipo_documento_id' => 1,
            'identificacion' => '52250275',
            'nombres' => 'Ana',
            'apellidos' => 'Arrazola',
            'name' => 'Ana Arrazola',
            'email' => 'aniarrazola@gmail.com',
            'genero' => 'F',
            'fecha_nacimiento' => '1974/07/06',
            'telefono' => '3102295019',
            'password' => bcrypt('52250275')
        ])->syncRoles(['Administrador','Usuario']);
        // + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + +
        $usuarios=[
            //['identificacion' => '52250275', 'nombres' => 'Ana','apellidos' => 'Arrazola', 'name' => 'Ana Arrazola', 'email' => 'aniarrazola@gmail.com', 'genero' => 'F', 'fecha_nacimiento' => '1974/07/06', 'telefono' => '3102295019',],
            ['identificacion' => '1000796413', 'nombres' => 'Nicolas','apellidos' => 'Vargas', 'name' => 'Nicolas Vargas', 'email' => 'aniarrazola@yahoo.com', 'genero' => 'M', 'fecha_nacimiento' => '2001/05/18', 'telefono' => '3102295019',],
            ['identificacion' => '20423473', 'nombres' => 'Myriam','apellidos' => 'Ruiz', 'name' => 'Myriam Ruiz', 'email' => 'elenaruiz@matinaflowers.com', 'genero' => 'F', 'fecha_nacimiento' => '1969/09/14', 'telefono' => '3125231987',],
            ['identificacion' => '39818722', 'nombres' => 'Adriana','apellidos' => 'Cortes', 'name' => 'Adriana Cortes', 'email' => 'acortes@aposentos.com.co', 'genero' => 'F', 'fecha_nacimiento' => '1978/11/02', 'telefono' => '3114710793',],
            ['identificacion' => '35522740', 'nombres' => 'Luisa','apellidos' => 'Latorre', 'name' => 'Luisa Latorre', 'email' => 'compras@colibriflowers.com', 'genero' => 'F', 'fecha_nacimiento' => '1970/05/05', 'telefono' => '3158923616',],
            ['identificacion' => '1003689143', 'nombres' => 'Crstian','apellidos' => 'Cardona', 'name' => 'Crstian Cardona', 'email' => 'compraspb@laplazoleta.com', 'genero' => 'M', 'fecha_nacimiento' => '1996/07/29', 'telefono' => '3118218828',],
            ['identificacion' => '51837436', 'nombres' => 'Alba','apellidos' => 'Nieto', 'name' => 'Alba Nieto', 'email' => 'compras@inverpalmas.com', 'genero' => 'F', 'fecha_nacimiento' => '1964/08/09', 'telefono' => '3174331642',],
            ['identificacion' => '1072641979', 'nombres' => 'Gilma','apellidos' => 'Rodriguez', 'name' => 'Gilma Rodriguez', 'email' => 'compras@aposentos.com.co', 'genero' => 'F', 'fecha_nacimiento' => '1986/11/13', 'telefono' => '3102326992',],
            ['identificacion' => '79186490', 'nombres' => 'William','apellidos' => 'Vinchery', 'name' => 'William Vinchery', 'email' => 'almacen@aposentos.com.co', 'genero' => 'M', 'fecha_nacimiento' => '1969/01/01', 'telefono' => '3108031393',],
            ['identificacion' => '3029332', 'nombres' => 'Edgar','apellidos' => 'Rodriguez', 'name' => 'Edgar Rodriguez', 'email' => 'sistemas@agromonte-sa.com', 'genero' => 'M', 'fecha_nacimiento' => '1984/02/15', 'telefono' => '3164681103',],
            //['identificacion' => '1111111', 'nombres' => 'Luis','apellidos' => 'Lleras', 'name' => 'Luis Lleras', 'email' => 'luisgabriel.lleras@gmail.com', 'genero' => 'M', 'fecha_nacimiento' => '1973/03/28', 'telefono' => '3114188912',],
            ['identificacion' => '1070947440', 'nombres' => 'Maritza','apellidos' => 'Bohorquez', 'name' => 'Maritza Bohorquez', 'email' => 'sgerencia@andalucia-sa.com', 'genero' => 'F', 'fecha_nacimiento' => '1987/08/09', 'telefono' => '3176416948',],
            ['identificacion' => '79533712', 'nombres' => 'Juan','apellidos' => 'Sanz', 'name' => 'Juan Sanz', 'email' => 'financiero@floresdeserrezuela.com', 'genero' => 'M', 'fecha_nacimiento' => '1971/07/03', 'telefono' => '3165260198',],
            ['identificacion' => '52037195', 'nombres' => 'Adriana','apellidos' => 'Corredor', 'name' => 'Adriana Corredor', 'email' => 'contabilidad@inverpalmas.com', 'genero' => 'F', 'fecha_nacimiento' => '1971/09/01', 'telefono' => '3174331659',],
            ['identificacion' => '35353208', 'nombres' => 'Adriana','apellidos' => 'Sarmiento', 'name' => 'Adriana Sarmiento', 'email' => 'financiera@laplazoleta.com', 'genero' => 'F', 'fecha_nacimiento' => '1981/02/28', 'telefono' => '3107635545',],
            ['identificacion' => '80181597', 'nombres' => 'Pablo','apellidos' => 'Hurtado', 'name' => 'Pablo Hurtado', 'email' => 'pablohurtado@floresaurora.com', 'genero' => 'M', 'fecha_nacimiento' => '1981/09/20', 'telefono' => '3115614962',],
            ['identificacion' => '20964210', 'nombres' => 'Mercedes','apellidos' => 'Sanchez', 'name' => 'Mercedes Sanchez', 'email' => 'comprasmsanchez@floresaurora.com', 'genero' => 'F', 'fecha_nacimiento' => '1966/07/23', 'telefono' => '3138701950',],
            ['identificacion' => '80181599', 'nombres' => 'Miguel','apellidos' => 'Hurtado', 'name' => 'Miguel Hurtado', 'email' => 'miguelhurtado@floresaurora.com', 'genero' => 'M', 'fecha_nacimiento' => '1981/09/20', 'telefono' => '3115614963',],
            ['identificacion' => '39768687', 'nombres' => 'Olga','apellidos' => 'Vera', 'name' => 'Olga Vera', 'email' => 'administracion@inverpalmas.com', 'genero' => 'F', 'fecha_nacimiento' => '1967/11/01', 'telefono' => '3044334698',],
            ['identificacion' => '11449383', 'nombres' => 'Jaime','apellidos' => 'Hernandez', 'name' => 'Jaime Hernandez', 'email' => 'compras@floresdeserrezuela.com', 'genero' => 'M', 'fecha_nacimiento' => '1984/10/03', 'telefono' => '3208514453',],
            ['identificacion' => '52710532', 'nombres' => 'Maria','apellidos' => 'Duarte', 'name' => 'Maria Duarte', 'email' => 'miduarte@aposentos.com.co', 'genero' => 'F', 'fecha_nacimiento' => '1980/03/01', 'telefono' => '3182617439',],
            ['identificacion' => '1070014674', 'nombres' => 'Jonathan','apellidos' => 'Cubides', 'name' => 'Jonathan Cubides', 'email' => 'compras@doneusebio.com', 'genero' => 'M', 'fecha_nacimiento' => '1994/04/06', 'telefono' => '3168328509',],
            ['identificacion' => '80215024', 'nombres' => 'Edwin','apellidos' => 'Diaz', 'name' => 'Edwin Diaz', 'email' => 'compras@turflor.com', 'genero' => 'M', 'fecha_nacimiento' => '1984/10/05', 'telefono' => '3212322984',],
            ['identificacion' => '39186548', 'nombres' => 'Myriam','apellidos' => 'Mejia', 'name' => 'Myriam Mejia', 'email' => 'mmejia@vegaflor.com', 'genero' => 'F', 'fecha_nacimiento' => '1972/07/11', 'telefono' => '3117201503',],
            ['identificacion' => '43626568', 'nombres' => 'Sandra','apellidos' => 'Uribe', 'name' => 'Sandra Uribe', 'email' => 'suribe@vegaflor.com', 'genero' => 'F', 'fecha_nacimiento' => '1976/06/04', 'telefono' => '3117201470',],
            ['identificacion' => '1045021117', 'nombres' => 'Andrea','apellidos' => 'Zuluaga', 'name' => 'Andrea Zuluaga', 'email' => 'azuluaga@vegaflor.com', 'genero' => 'F', 'fecha_nacimiento' => '1992/05/04', 'telefono' => '3234940511',],
            ['identificacion' => '71611143', 'nombres' => 'Miguel','apellidos' => 'Vasquez', 'name' => 'Miguel Vasquez', 'email' => 'mvasquez@vegaflor.com', 'genero' => 'M', 'fecha_nacimiento' => '1962/01/10', 'telefono' => '3117616465',],
            ['identificacion' => '1022373278', 'nombres' => 'Karen','apellidos' => 'Gutierrez', 'name' => 'Karen Gutierrez', 'email' => 'financiera@turflor.com', 'genero' => 'F', 'fecha_nacimiento' => '1992/01/21', 'telefono' => '3133438444',],
            ['identificacion' => '1005716470', 'nombres' => 'Tatiana','apellidos' => 'Perdomo', 'name' => 'Tatiana Perdomo', 'email' => 'compras@agromonte-sa.com', 'genero' => 'F', 'fecha_nacimiento' => '2002/02/09', 'telefono' => '3174424982',],
            ['identificacion' => '1020812497', 'nombres' => 'Alejandro','apellidos' => 'Romero', 'name' => 'Alejandro Romero', 'email' => 'alejandro@colibriflowers.com', 'genero' => 'M', 'fecha_nacimiento' => '1996/02/03', 'telefono' => '3134957134',],
            ['identificacion' => '39442255', 'nombres' => 'Diana','apellidos' => 'Morales', 'name' => 'Diana Morales', 'email' => 'ymorales@vegaflor.com', 'genero' => 'F', 'fecha_nacimiento' => '1970/07/11', 'telefono' => '3122546089',],
            ['identificacion' => '80088999', 'nombres' => 'Juan','apellidos' => 'Esguerra', 'name' => 'Juan Esguerra', 'email' => 'gerencia@turflor.com', 'genero' => 'M', 'fecha_nacimiento' => '1981/03/06', 'telefono' => '3153375981',],
            ['identificacion' => '53088324', 'nombres' => 'Claudia','apellidos' => 'Figueroa', 'name' => 'Claudia Figueroa', 'email' => 'compras@ayura.co', 'genero' => 'F', 'fecha_nacimiento' => '1985/03/22', 'telefono' => 'aniarrazola@gmail.com',],

        ];
        foreach ($usuarios as $item) {
            User::create([
                'tipo_documento_id' => 1,
                'identificacion' => $item['identificacion'],
                'nombres' => $item['nombres'],
                'apellidos' => $item['apellidos'],
                'name' => $item['name'],
                'email' => $item['email'],
                'genero' => $item['genero'],
                'fecha_nacimiento' => $item['fecha_nacimiento'],
                'telefono' => $item['telefono'],
                'password' => bcrypt($item['identificacion']),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ])->syncRoles('Usuario');
        }

    }
}

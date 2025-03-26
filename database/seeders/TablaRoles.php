<?php

namespace Database\Seeders;

use App\Models\Empresa\OpcionArchivo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TablaRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        // ===================================================================================
        $rol1 = Role::create(['name' => 'Administrador Sistema']);
        $rol2 = Role::create(['name' => 'Administrador']);
        $rol3 = Role::create(['name' => 'Usuario']);


        Permission::create(['name' => 'dashboard'])->syncRoles([$rol1,$rol2,$rol3]);
        // ===================================================================================
        Permission::create(['name' => 'usuario.index'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'usuario.create'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'usuario.edit'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'usuario.store'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'usuario.update'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'usuario.destroy'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'usuario.activar'])->syncRoles([$rol1,$rol2]);
        // ===================================================================================
        Permission::create(['name' => 'finca.index'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'finca.create'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'finca.edit'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'finca.store'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'finca.update'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'finca.destroy'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'finca.activar'])->syncRoles([$rol1,$rol2]);

    }
}

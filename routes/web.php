<?php

use App\Http\Controllers\Config\FincaController;
use App\Http\Controllers\Config\MenuController;
use App\Http\Controllers\Config\MenuRolController;
use App\Http\Controllers\Config\ParametroController;
use App\Http\Controllers\Config\RolController;
use App\Http\Controllers\Config\UsuarioController;
use App\Http\Controllers\Extranet\ExtranetPageController;
use App\Http\Controllers\Intranet\Index\IntranetPageController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::controller(ExtranetPageController::class)->group(function () {
    Route::get('/', 'index')->name('extranet.index');
    Route::get('/nuestrasfincas', 'nuestrasfincas')->name('extranet.nuestrasfincas');
    Route::get('/historia', 'historia')->name('extranet.historia');
    Route::get('/login', 'login_extranet')->name('login');
});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->prefix('dashboard')->group(function () {
    Route::get('/', [IntranetPageController::class, 'dashboard'])->name('dashboard');
    //===================================================================================================
    Route::prefix('configuracion_sis')->group(function () {
        Route::controller(MenuController::class)->prefix('menu')->group(function () {
            Route::get('', 'index')->name('menu.index');
            Route::get('crear', 'create')->name('menu.create');
            Route::get('editar/{id}', 'edit')->name('menu.edit');
            Route::post('guardar', 'store')->name('menu.store');
            Route::put('actualizar/{id}', 'update')->name('menu.update');
            Route::get('eliminar/{id}', 'destroy')->name('menu.destroy');
            Route::get('guardar-orden', 'guardarOrden')->name('menu.ordenar');
        });
        // ------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Roles
        Route::controller(RolController::class)->prefix('rol')->group(function () {
            Route::get('', 'index')->name('rol.index');
            Route::get('crear', 'create')->name('rol.create');
            Route::get('editar/{id}', 'edit')->name('rol.edit');
            Route::post('guardar', 'store')->name('rol.store');
            Route::put('actualizar/{id}', 'update')->name('rol.update');
            Route::delete('eliminar/{id}', 'destroy')->name('rol.destroy');
        });
        // ----------------------------------------------------------------------------------------
        /* Ruta Administrador del Sistema Menu Rol*/
        Route::controller(MenuRolController::class)->prefix('menu_rol')->group(function () {
            Route::get('', 'index')->name('menu.rol.index');
            Route::post('guardar', 'store')->name('menu.rol.store');
        });
        // ----------------------------------------------------------------------------------------
        // ----------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Usuarios
        Route::controller(UsuarioController::class)->prefix('usuarios')->group(function () {
            Route::get('', 'index')->name('usuario.index');
            Route::get('crear', 'create')->name('usuario.create');
            Route::get('editar/{id}', 'edit')->name('usuario.edit');
            Route::post('guardar', 'store')->name('usuario.store');
            Route::put('actualizar/{id}', 'update')->name('usuario.update');
            Route::delete('eliminar/{id}', 'destroy')->name('usuario.destroy');
            Route::put('activar/{id}', 'activar')->name('usuario.activar');
            Route::post('archivo', 'archivo')->name('usuario.archivo');
            // *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--*
        });
        // ----------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Usuarios
        Route::controller(FincaController::class)->prefix('fincas')->group(function () {
            Route::get('', 'index')->name('finca.index');
            Route::get('crear', 'create')->name('finca.create');
            Route::get('editar/{id}', 'edit')->name('finca.edit');
            Route::post('guardar', 'store')->name('finca.store');
            Route::put('actualizar/{id}', 'update')->name('finca.update');
            Route::delete('eliminar/{id}', 'destroy')->name('finca.destroy');
            Route::put('activar/{id}', 'activar')->name('finca.activar');
            // *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--*
        });
        // ----------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Usuarios
        Route::controller(ParametroController::class)->prefix('parametros')->group(function () {
            Route::get('', 'index')->name('parametro.index');
            Route::put('update_logo', 'update_logo')->name('update_logo.update');
            Route::put('update_historia', 'update_historia')->name('update_historia.update');
            Route::post('slider', 'slider')->name('slider.update');
            Route::delete('slider_destroy/{id}', 'slider_destroy')->name('slider_destroy.destroy');
            // *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--*
        });
        // ----------------------------------------------------------------------------------------
    });
    //===================================================================================================
});

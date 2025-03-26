<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Models\Empresa\Finca;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Laravel\Facades\Image;



class FincaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fincas = Finca::get();
        return view('intranet.config.fincas.index', compact('fincas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('intranet.config.fincas.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // - - - - - - - - - - - - - - - - - - - - - - - -
        if ($request->hasFile('logo')) {
            $ruta = Config::get('constantes.folder_img_fincas');
            $ruta = trim($ruta);
            $logo = $request->logo;
            $imagen_logo = Image::read($logo);
            $nombrelogo = time() . $logo->getClientOriginalName();
            $imagen_logo->resize(900, 500);
            $imagen_logo->save($ruta . $nombrelogo, 100);
        }
        // - - - - - - - - - - - - - - - - - - - - - - - -

        $usuario_new = Finca::create([
            'nombre' => $request['nombre'],
            'logo' => $nombrelogo,
            'url' => $request['url'],
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        return redirect('dashboard/configuracion_sis/fincas')->with('mensaje', 'Finca creada con exito');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $finca_edit = Finca::findOrfail($id);
        return view('intranet.config.fincas.editar', compact('finca_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $finca_edit = Finca::findOrFail($id);
        // - - - - - - - - - - - - - - - - - - - - - - - -
        if ($request->hasFile('logo')) {
            $ruta = Config::get('constantes.folder_img_fincas');
            $ruta = trim($ruta);
            $logo = $request->logo;
            $imagen_logo = Image::read($logo);
            $nombrelogo = time() . $logo->getClientOriginalName();
            $imagen_logo->resize(900, 500);
            unlink($ruta.$finca_edit->logo);
            $imagen_logo->save($ruta . $nombrelogo, 100);
        }
        // - - - - - - - - - - - - - - - - - - - - - - - -
        $cambios['nombre'] = $request['nombre'];
        $cambios['logo'] = $nombrelogo;
        $cambios['url'] = $request['url'];
        $finca_edit->update($cambios);
        return redirect('dashboard/configuracion_sis/fincas')->with('mensaje', 'Finca editada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Finca::destroy($id)) {
                $finca_edit = Finca::findOrFail($id);
                $ruta = Config::get('constantes.folder_img_fincas');
                $ruta = trim($ruta);
                unlink($ruta.$finca_edit->logo);
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    public function activar(Request $request, $id)
    {
        if ($request->ajax()) {
            $finca = Finca::findOrfail($id);
            if ($finca->estado === 1) {
                $fincacambio['estado'] = 0;
                Finca::findOrFail($id)->update($fincacambio);
                $activacion = 'El usuario fue desactivado de manera correcta';
            } else {
                $fincacambio['estado'] = 1;
                Finca::findOrFail($id)->update($fincacambio);
                $activacion = 'El usuario fue activado de manera correcta';
            }
            return response()->json(['mensaje' => 'ok', 'activacion' => $activacion]);
        } else {
            abort(404);
        }
    }
}

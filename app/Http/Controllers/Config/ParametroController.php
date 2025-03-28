<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Models\Config\Parametro;
use App\Models\Empresa\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Laravel\Facades\Image;

class ParametroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parametro = Parametro::findOrFail(1);
        $sliders = Slider::get();
        return view('intranet.config.parametros.index', compact('parametro', 'sliders'));
    }

    public function update_logo(Request $request)
    {
        $parametro = Parametro::findOrFail(1);
        // - - - - - - - - - - - - - - - - - - - - - - - -
        if ($request->hasFile('logo')) {
            $ruta = Config::get('constantes.folder_sistema');
            $ruta = trim($ruta);
            $logo = $request->logo;
            $imagen_logo = Image::read($logo);
            $nombrelogo = 'logo.png';
            $imagen_logo->resize(800, 800);
            unlink($ruta . $parametro->logo);
            $imagen_logo->save($ruta . $nombrelogo, 100);
        }
        // - - - - - - - - - - - - - - - - - - - - - - - -
        $cambios['logo'] = $nombrelogo;
        $parametro->update($cambios);

        return redirect('dashboard/configuracion_sis/parametros')->with('mensaje', 'Información actualizada con exito');
    }
    public function update_historia(Request $request)
    {
        $parametro = Parametro::findOrFail(1);
        $cambios['texto'] = $request['texto'];
        $parametro->update($cambios);
        return redirect('dashboard/configuracion_sis/parametros')->with('mensaje', 'Información actualizada con exito');
    }
    public function slider(Request $request)
    {
        // - - - - - - - - - - - - - - - - - - - - - - - -
        if ($request->hasFile('foto')) {
            $ruta = Config::get('constantes.folder_sistema');
            $ruta = trim($ruta);
            $foto = $request->foto;
            $imagen_foto = Image::read($foto);
            $nombrefoto = time() . $foto->getClientOriginalName();
            $imagen_foto->resize(1280, 404);
            $imagen_foto->save($ruta . $nombrefoto, 100);

            $cambios['foto'] = $nombrefoto;

            $slider_new = Slider::create([
                'foto' => $nombrefoto,
                'titulo' => $request['titulo'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        // - - - - - - - - - - - - - - - - - - - - - - - -
        return redirect('dashboard/configuracion_sis/parametros')->with('mensaje', 'Información actualizada con exito');
    }

    public function slider_destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $slider_edit = Slider::findOrFail($id);
            if (Slider::destroy($id)) {
                $ruta = Config::get('constantes.folder_sistema');
                $ruta = trim($ruta);
                unlink($ruta . $slider_edit->foto);
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

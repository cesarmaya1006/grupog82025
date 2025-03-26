<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Mail\ArchivoProveedores;
use App\Models\Config\Parametro;
use App\Models\Config\TipoDocumento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Laravel\Facades\Image;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::whereHas('roles', function ($q)  {
            $q->whereIn('id', [2,3]);
        })->get();
        return view('intranet.config.usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposdocu = TipoDocumento::get();
        return view('intranet.config.usuarios.crear',compact('tiposdocu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {
        //dd($request->all());
        $usuario_new = User::create([
            'tipo_documento_id' => $request['tipo_documento_id'],
            'identificacion' => $request['identificacion'],
            'nombres' => ucfirst($request['nombres']),
            'apellidos' => ucfirst($request['apellidos']),
            'name' => explode(' ', trim(ucfirst($request['nombres']) ))[0] . ' ' . explode(' ', trim(ucfirst($request['apellidos']) ))[0],
            'email' => $request['email'],
            'genero' => $request['genero'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'telefono' => $request['telefono'],
            'password' => bcrypt($request['identificacion']),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ])->syncRoles('Usuario');
        return redirect('dashboard/configuracion_sis/usuarios')->with('mensaje', 'Usuario creado con exito');
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
        $tiposdocu = TipoDocumento::get();
        $usuario_edit = User::findOrfail($id);
        return view('intranet.config.usuarios.editar',compact('tiposdocu','usuario_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioRequest $request, string $id)
    {
        //dd($request->all());
        $usuario_new = User::findOrFail($id)->update([
            'tipo_documento_id' => $request['tipo_documento_id'],
            'identificacion' => $request['identificacion'],
            'nombres' => ucfirst($request['nombres']),
            'apellidos' => ucfirst($request['apellidos']),
            'name' => explode(' ', trim(ucfirst($request['nombres']) ))[0] . ' ' . explode(' ', trim(ucfirst($request['apellidos']) ))[0],
            'email' => $request['email'],
            'genero' => $request['genero'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'telefono' => $request['telefono'],
            'password' => bcrypt($request['identificacion']),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        return redirect('dashboard/configuracion_sis/usuarios')->with('mensaje', 'Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            if (User::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    public function activar(Request $request,$id){
        if ($request->ajax()) {
            $usuario = User::findOrfail($id);
            if ($usuario->estado === 1) {
                $usuacambio['estado'] = 0;
                User::findOrFail($id)->update($usuacambio);
                $activacion = 'El usuario fue desactivado de manera correcta';
            } else {
                $usuacambio['estado'] = 1;
                User::findOrFail($id)->update($usuacambio);
                $activacion = 'El usuario fue activado de manera correcta';
            }

            return response()->json(['mensaje' => 'ok','activacion' => $activacion]);
        } else {
            abort(404);
        }
    }

    public function archivo(Request $request)
    {
        // - - - - - - - - - - - - - - - - - - - - - - - -
        if ($request->hasFile('archivo')) {
            $parametro = Parametro::findOrFail(1);
            $ruta = Config::get('constantes.folder_img_fincas');
            $ruta = trim($ruta);
            $archivo = $request->archivo;
            $nombrearchivo = time() . $archivo->getClientOriginalName();
            if ($parametro->url != null) {
                unlink($ruta.$parametro->url);
            }

            $archivo->move($ruta, 'archivo_proveedores.xlsx');
            $usuarios = User::where('id','>', 3);
            foreach ($usuarios as $usuario) {
                # code...
            }
            $cambioArchivo = $request['cambios'];
            Mail::to('cesarmaya1006@gmail.com')->send(new ArchivoProveedores($cambioArchivo));

            $cambios['fecha'] = date('Y-m-d');
            $cambios['hora'] = date('H:i:s');
            $cambios['url'] = 'archivo_proveedores.xlsx';
            $cambios['cambios'] = $request['cambios'];
            $parametro->update($cambios);

            return redirect('dashboard')->with('mensaje', 'Archivo subido con exito');
        }else{
            return redirect('dashboard')->with('error', 'El Archivo no se pudo cargar con exito');
        }
        // - - - - - - - - - - - - - - - - - - - - - - - -
    }
}

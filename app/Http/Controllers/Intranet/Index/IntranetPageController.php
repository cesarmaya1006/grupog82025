<?php

namespace App\Http\Controllers\Intranet\Index;

use App\Http\Controllers\Controller;
use App\Models\Empresa\Acceso;
use Illuminate\Http\Request;

use App\Mail\ArchivoProveedores;
use App\Models\Config\Parametro;
use Illuminate\Support\Facades\Mail;

class IntranetPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $accesos = Acceso::get();
        $parametro_ = Parametro::findOrFail(1);
        $parametro = $parametro_->url;


        $cambioArchivo ='Cambios de prueba';
        Mail::to('cesarmaya1006@gmail.com')->send(new ArchivoProveedores($cambioArchivo,$parametro));



        return view('intranet.dashboard.index',compact('accesos'));
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

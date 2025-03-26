<?php

namespace App\Http\Controllers\Extranet;

use App\Http\Controllers\Controller;
use App\Models\Empresa\Finca;
use App\Models\Empresa\Slider;
use Illuminate\Http\Request;

class ExtranetPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::OrderBy('id')->get();
        $fincas = Finca::OrderBy('id')->get();
        return view('extranet.index.index', compact('slider', 'fincas'));
    }

    public function nuestrasfincas() {
        $fincas = Finca::OrderBy('id')->get();
        return view('extranet.nuestras.nuestras',compact('fincas'));
    }
    public function login_extranet() {
        return view('extranet.login.login');
    }
    public function historia() {
        return view('extranet.historia.historia');
    }


}

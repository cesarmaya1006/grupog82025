@extends('extranet.layout.app')
@section('css_pagina')
<link rel="stylesheet" href="{{asset('css/extranet/nuestras/nuestras.css')}}">
@endsection

@section('cuerpoPagina')
<div class="row d-flex justify-content-center mt-4">
    <div class="col-2 d-flex justify-content-center">
        <h3 class="vertical">Nuestras Fincas Aliadas</h3>
    </div>
    <div class="col-10 col-md-5 col-lg-5">
        @foreach ($fincas->chunk(2) as $chunk)
        <div class="row d-flex justify-content-around">
            @foreach ($chunk as $finca)
            <div class="col-10 col-md-5 mb-3"><a href="@if($finca->url==''){{'#'}}@else{{$finca->url}}@endif" target="_blank"><img class="img-fluid" style="width: 350px; height: auto;" src="{{asset('imagenes/sistema/logos/'.$finca->logo)}}" alt="{{$finca->nombre}}"></a></div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12 col-md-6 col-lg-6 pl-md-3 pl-lg-3 pr-md-3 pr-lg-3">
    </div>
    <div class="col-12 col-md-6 col-lg-6">
        <div class="row pt-3 mt-3">
            <div class="col-12 pl-4 text-center"><h6 style="font-size: 16pt; font-weight: bold; color: grey;">Solicita Información</h6></div>
            <div class="col-12 pl-4 text-center">
                <a href="https://api.whatsapp.com/send?phone=573102295019&amp;text=Hola%20requiero%20información%20del%20Grupo%20G8" target="_blank"><img src="{{asset('imagenes/sistema/whatsapp-icon.png')}}" border="0" alt="" width="57" height="57"></a>
            </div>
        </div>
    </div>
</div>
@endsection

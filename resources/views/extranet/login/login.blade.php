@extends('extranet.layout.app')
@section('css_pagina')
@endsection

@section('cuerpoPagina')
<div class="row d-flex justify-content-center" style="min-height: 55vh;">
    <div class="col-8 col-md-5 col-lg-5 pt-5">
        @include('includes.mensaje')
        @include('includes.error-form')
        <div class="row">
            <div class="col-12 text-center">
                <h2>Login</h2>
            </div>
        </div>
        <br><br>
        <form class="row mt-2" style="width: 100%;" action="{{ route('login') }}" method="post" autocomplete="off">
            @method('post')
            @csrf
            <div class="col-12">
                <div class="row form-group d-flex justify-content-center">
                    <input id="email" name="email" type="email" placeholder="Correo Electronico" class="form-control col-12 col-md-4 col-lg-4" required>
                </div>
            </div>
            <div class="col-12">
                <div class="row form-group d-flex justify-content-center">
                    <input id="password" name="password" type="password" placeholder="Contraseña" class="form-control col-12 col-md-4 col-lg-4" required>
                </div>
            </div>
            <br>
            <div class="col-12 mt-3">
                <div class="row form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary col-5 col-md-2 col-lg-2" style="font-size: 1em;width: 150px;">Ingresar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

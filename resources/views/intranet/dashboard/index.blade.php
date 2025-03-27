@extends('intranet.layout.app')
@section('css_pagina')

@endsection
@section('tituloPagina')
    <i class="fa fa-home" aria-hidden="true"></i> Dashboard
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
@endsection
@section('titulo_card')

@endsection
@section('botones_card')

@endsection
@section('cuerpoPagina')
    <div class="row">
        <div class="col-12">
            <h3>Sistema de gestión de proveedores Fincas G8</h3>
        </div>
    </div>
    <hr>
    @can('accesoSistema')


    <div class="row">
        <div class="col-12"><h4>Accesos al sistema</h4></div>
        <div class="col-12 table-responsive">
            <table class="table table-striped table-hover table-sm tabla_data_table_m tabla-borrando" id="tabla-data">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accesos as $acceso)
                        <tr>
                            <td class="text-nowrap text-center">{{ $acceso->id }}</td>
                            <td class="text-nowrap">{{ $acceso->fecha }}</td>
                            <td class="text-nowrap">{{ $acceso->hora }}</td>
                            <td class="text-nowrap">{{ $acceso->usuario->nombres . ' ' .  $acceso->usuario->apellidos}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    @endcan-
    <div class="row">
        <div class="col-12">
            <h4>Archivo de Proveedores</h4>
        </div>
        <br><br>
        @can('subirArchivo')
        <div class="col-12 col-md-6" style="background-color: rgba(202, 202, 202, 0.5)">
            <div class="row p-4">
                <div class="col-12"><h6><strong>Cargar Archivo</strong></h6></div>
                <form class="col-12 form-horizontal mt-4" action="{{ route('usuario.archivo') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="requerido" for="cambios">Cambios</label>
                                <input type="text" class="form-control form-control-sm" name="cambios" id="cambios" required>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label class="requerido" for="archivo">Archivo</label>
                            <input type="file" class="form-control form-control-sm" id="archivo" name="archivo" placeholder="Foto del usuario" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 mb-4 mb-md-0 d-grid gap-2 d-md-block ">
                            <button type="submit" class="btn btn-primary btn-sm btn-sombra pl-sm-5 pr-sm-5" style="font-size: 0.8em;">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endcan

        <div class="col-12 col-md-6" style="background-color: rgb(255, 243, 220)">
            <div class="row p-4">
                <div class="col-12"><h6><strong>Descargar Archivo de Proveedores</strong></h6></div>
                <div class="col-12">
                    <a href="{{asset('imagenes/sistema/logos/archivo_proveedores.xlsx')}}" target="_blank" rel="noopener noreferrer"><img src="{{asset('imagenes/sistema/excel.png')}}" class="img-fluid" alt="..."></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_card')
@endsection

@section('modales')
@endsection

@section('script_pagina')
@endsection

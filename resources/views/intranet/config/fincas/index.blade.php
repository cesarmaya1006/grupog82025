@extends('intranet.layout.app')
@section('css_pagina')

@endsection
@section('tituloPagina')
    <i class="fas fa-tree" aria-hidden="true"></i> Fincas
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Fincas</a></li>
@endsection
@section('titulo_card')
    Listado de Fincas
@endsection
@section('botones_card')
    @can('finca.create')
        <a href="{{ route('finca.create') }}" class="btn btn-primary btn-xs btn-sombra text-center pl-5 pr-5 float-md-end">
            <i class="fa fa-plus-circle mr-3" aria-hidden="true"></i>
            Nuevo Registro
        </a>
    @endcan
@endsection
@section('cuerpoPagina')
    @can('finca.index')
        <div class="row d-flex justify-content-md-center">
            <div class="col-12 table-responsive">
                @csrf
                <table class="table table-striped table-hover table-sm tabla_data_table_m tabla-borrando" id="tabla-data">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Url</th>
                            <th>Estado</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fincas as $finca)
                            <tr>
                                <td class="text-nowrap text-center">{{ $finca->id }}</td>
                                <td class="text-nowrap">{{ $finca->nombre}}</td>
                                <td class="text-nowrap"><img src="{{ asset('imagenes/sistema/logos/'.$finca->logo) }}" class="img-fluid" alt="..." style="width: 150px;height: auto;"></td>
                                <td class="text-nowrap"><a href="{{ $finca->url }}" target="_blank" rel="noopener noreferrer">{{ $finca->url }}</a></td>
                                <td>
                                    @can('finca.activar')
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="estado_{{$finca->id}}" onClick="activarFincas('{{route('finca.activar',['id'=>$finca->id])}}','estado_{{$finca->id}}')" {{ $finca->estado == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="estado">Finca {{ $finca->estado == 1 ? 'Activa' : 'Inactiva' }}</label>
                                        </div>
                                    @else
                                        <span class="btn-info btn-xs pl-3 pr-3 bg-{{ $finca->estado == 1 ? 'success' : 'gray' }} rounded">{{ $finca->estado == 1 ? 'Activo' : 'Inactivo' }}</span>
                                    @endcan
                                </td>
                                <td class="d-flex justify-content-evenly">
                                    @can('finca.edit')
                                        <a href="{{ route('finca.edit', ['id' => $finca->id]) }}" class="btn-accion-tabla tooltipsC text-info" title="Editar">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                    @endcan
                                    @can('finca.destroy')
                                        <form action="{{ route('finca.destroy', ['id' => $finca->id]) }}"class="d-inline form-eliminar" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                                <i class="fa fa-fw fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6">
                <div class="alert alert-warning alert-dismissible mini_sombra">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Sin Acceso!</h5>
                    <p style="text-align: justify">Su usuario no tiene permisos de acceso para esta vista, Comuniquese con el
                        administrador del sistema.</p>
                </div>
            </div>
        </div>
    @endcan
@endsection

@section('footer_card')
@endsection

@section('modales')
@endsection

@section('script_pagina')
    @include('intranet.layout.dataTableNew')
    <script src="{{ asset('js/intranet/general/datatablesini.js') }}"></script>
    <script src="{{ asset('js/intranet/config/fincas/index.js') }}"></script>
@endsection


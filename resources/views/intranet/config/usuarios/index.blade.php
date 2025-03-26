@extends('intranet.layout.app')
@section('css_pagina')

@endsection
@section('tituloPagina')
    <i class="fas fa-industry" aria-hidden="true"></i> Usuarios
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
@endsection
@section('titulo_card')
    Listado de Usuarios
@endsection
@section('botones_card')
    @can('usuario.create')
        <a href="{{ route('usuario.create') }}" class="btn btn-primary btn-xs btn-sombra text-center pl-5 pr-5 float-md-end">
            <i class="fa fa-plus-circle mr-3" aria-hidden="true"></i>
            Nuevo Registro
        </a>
    @endcan
@endsection
@section('cuerpoPagina')
    @can('usuario.index')
        <div class="row d-flex justify-content-md-center">
            <div class="col-12 table-responsive">
                @csrf
                <table class="table table-striped table-hover table-sm tabla_data_table_m tabla-borrando" id="tabla-data">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th>Rol</th>
                            <th>Nombres y Apellidos</th>
                            <th>N. de Identificación</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td class="text-nowrap text-center">{{ $usuario->id }}</td>
                                <td class="text-nowrap">{{ $usuario->hasRole(2)? 'Administrador' : 'Usuario'}}</td>
                                <td class="text-nowrap">{{ $usuario->nombres . ' ' . $usuario->apellidos }}</td>
                                <td class="text-nowrap">{{ $usuario->tipo_docu->abreb_id . ' ' . $usuario->identificacion }}</td>
                                <td class="text-nowrap">{{ $usuario->email }}</td>
                                <td class="text-nowrap">{{ $usuario->telefono }}</td>
                                <td>
                                    @can('usuario.activar')
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="estado_{{$usuario->id}}" onClick="activarUsuarios('{{route('usuario.activar',['id'=>$usuario->id])}}','estado_{{$usuario->id}}')" {{ $usuario->estado == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="estado">Usuario {{ $usuario->estado == 1 ? 'Activo' : 'Inactivo' }}</label>
                                        </div>
                                    @else
                                        <span class="btn-info btn-xs pl-3 pr-3 bg-{{ $usuario->estado == 1 ? 'success' : 'gray' }} rounded">{{ $usuario->estado == 1 ? 'Activo' : 'Inactivo' }}</span>
                                    @endcan
                                </td>
                                <td class="d-flex justify-content-evenly">
                                    @can('usuario.edit')
                                        <a href="{{ route('usuario.edit', ['id' => $usuario->id]) }}" class="btn-accion-tabla tooltipsC text-info" title="Editar">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                    @endcan
                                    @can('usuario.destroy')
                                        <form action="{{ route('usuario.destroy', ['id' => $usuario->id]) }}"class="d-inline form-eliminar" method="POST">
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
    <script src="{{ asset('js/intranet/config/usuarios/index.js') }}"></script>
@endsection


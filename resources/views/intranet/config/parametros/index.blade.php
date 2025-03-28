@extends('intranet.layout.app')
@section('css_pagina')

@endsection
@section('tituloPagina')
    <i class="fas fa-cogs" aria-hidden="true"></i> Parametros
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Parametros</a></li>
@endsection
@section('titulo_card')

@endsection
@section('botones_card')

@endsection
@section('cuerpoPagina')
    @can('parametro.index')
        <div class="row">
            <div class="col-12 col-md-6 pl-4 pr-4">
                <div class="row">
                    <div class="col-12 text-center"><h4><strong>Logo Aplicación</strong></h4></div>
                    <div class="col-12 text-center pt-4 pb-4">
                        <img class="img-fluid" id="logo_foto" src="{{ asset('/imagenes/sistema/'.$parametro->logo) }}" style="max-height: 200px;width: auto;">
                    </div>
                    <form class="col-12 form-horizontal" action="{{ route('update_logo.update') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12 col-md-7 form-group">
                                <label for="logo" class="requerido">Nuevo Logo</label>
                                <input type="file" class="form-control form-control-sm" id="logo" name="logo" placeholder="Foto del usuario" accept="image/png,image/jpeg" onchange="mostrar()">
                            </div>
                        </div>
                        <div class="row mt-2 mb-4">
                            <div class="col-12 mb-4 mb-md-0 d-grid gap-2 d-md-block ">
                                <button type="submit" class="btn btn-primary btn-sm btn-sombra pl-sm-5 pr-sm-5" style="font-size: 0.8em;">Actualizar Logo</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-md-6 d-flex justify-content-center">
                                <table class="table" style="font-size: 0.7em;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" colspan="3">Resticciones:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold">Alto</td>
                                            <td class="font-weight-bold">Ancho</td>
                                            <td class="font-weight-bold"> Resolución</td>
                                        </tr>
                                        <tr>
                                            <td>800 px</td>
                                            <td>800 px</td>
                                            <td>100 dpi</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 pl-4 pr-4">
                <div class="row">
                    <div class="col-12 text-center"><h4><strong>Texto Historia</strong></h4></div>
                    <form class="col-12 form-horizontal" action="{{ route('update_historia.update') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12 form-group">
                                <textarea name="texto" class="form-control form-control-sm" cols="30" rows="10" style="resize: none;">{{$parametro->texto}}</textarea>
                            </div>
                        </div>
                        <div class="row mt-2 mb-4 mt-5">
                            <div class="col-12 mb-4 mb-md-0 d-grid gap-2 d-md-block ">
                                <button type="submit" class="btn btn-primary btn-sm btn-sombra pl-sm-5 pr-sm-5" style="font-size: 0.8em;">Actualizar Texto</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <h3><strong>Slider Principal</strong></h3>
            </div>
            <div class="col-12 col-md-6 table-responsive">
                <table class="table table-striped table-hover tabla-borrando" style="font-size: 0.8em;">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Titulo</th>
                            <th scope="col" class="text-center">Imagen</th>
                            <th scope="col" class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <th scope="row">{{$slider->titulo}}</th>
                                <td class="pl-3 pr-3 pt-3 pb-3"><img src="{{asset('imagenes/sistema/'.$slider->foto)}}" class="img-fluid" alt="..."></td>
                                <td>
                                    <form action="{{ route('slider_destroy.destroy', ['id' => $slider->id]) }}"class="d-inline form-eliminar" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                            <i class="fa fa-fw fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <form class="col-12 col-md-6 form-horizontal pl-5 pr-5 pt-3 pb-3" action="{{ route('slider.update') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-12 mb-5">
                        <h5><strong>Nuevo Elemento del slider</strong></h5>
                    </div>
                    <div class="col-12 form-group">
                        <label class="requerido" for="titulo">Titulo de la Foto</label>
                        <input type="text" class="form-control form-control-sm" name="titulo" id="titulo" required>
                    </div>
                    <div class="col-12 form-group">
                        <input type="file" class="form-control form-control-sm" id="foto" name="foto" accept="image/png,image/jpeg" required>
                    </div>
                </div>
                <div class="row mt-2 mb-4">
                    <div class="col-12 mb-4 mb-md-0 d-grid gap-2 d-md-block ">
                        <button type="submit" class="btn btn-primary btn-sm btn-sombra pl-sm-5 pr-sm-5" style="font-size: 0.8em;">Guardar Foto Slider</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 text-center">
                        <div class="row">
                            <div class="col-12 col-md-6 d-flex justify-content-center">
                                <table class="table" style="font-size: 0.7em;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" colspan="3">Resticciones:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold">Alto</td>
                                            <td class="font-weight-bold">Ancho</td>
                                            <td class="font-weight-bold"> Resolución</td>
                                        </tr>
                                        <tr>
                                            <td>404 px</td>
                                            <td>1280 px</td>
                                            <td>100 dpi</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
    <script src="{{ asset('js/intranet/config/parametros/index.js') }}"></script>
@endsection


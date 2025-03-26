<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('imagenes/sistema/logo.png') }}" sizes="64x64">
    <title>FINCAS G8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Css General -->
    <link rel="stylesheet" href="{{ asset('css/extranet/general/general.css') }}">
    <!-- animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel:700|Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css?family=Acme|Courgette|Dancing+Script|Fira+Sans+Condensed|Great+Vibes|Homemade+Apple|Poppins|Roboto+Condensed|Satisfy|Ubuntu&display=swap" rel="stylesheet">
    @yield('css_pagina')
</head>

<body>
    <div class="row contenido_principal" id="contenido_principal">
        <div class="col-12">
            <div class="row d-flex justify-content-center border-bottom border-warning">
                <div class="col-12 col-lg-10 col-md-10 d-flex justify-content-center">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="{{ route('extranet.index') }}">
                            <img src="{{ asset('imagenes/sistema/logo.png') }}" width="130" height="130" loading="lazy">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('extranet.index') }}">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('extranet.nuestrasfincas') }}">Nuestras FincasAliadas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('extranet.historia') }}">Historia</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <hr class="border-top border-warning">
                </div>
            </div>
            @yield('cuerpoPagina')
        </div>
    </div>
    <div class="row pantalla" id="pantalla"style="height: 98vh; width: 98vw;">
        <div class="col-12 pantalla_inicial d-flex justify-content-center align-items-center" style="height: 100vh">
            <img id="imagen_inicial" class="rounded mx-auto d-block" src="{{ asset('imagenes/sistema/logo.png') }}"
                style="width: 300px;height: 300px;">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="{{asset('js/extranet/general/general.js')}}"></script>
    @yield('script_pagina')
</body>

</html>

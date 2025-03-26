@extends('extranet.layout.app')

@section('cuerpoPagina')
    <div class="row">
        <div class="col-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @php
                        $control = 0;
                    @endphp
                    @foreach ($slider as $item)
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $control }}" class="{{ $control === 0 ? 'active' : '' }}" aria-current="{{ $control === 0 ? 'true' : '' }}" aria-label="{{ $item->titulo }}"></button>
                        @php
                            $control++;
                        @endphp
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @php
                        $control = 0;
                    @endphp
                    @foreach ($slider as $item)
                        <div class="carousel-item {{ $control === 0 ? 'active' : '' }}">
                            <img src="{{ asset('imagenes/sistema/' . $item->foto) }}" class="d-block w-100" alt="{{ $item->titulo }}">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 style="font-size: 35pt;color: black;text-shadow: 1px 1px white;">
                                    {{ $item->titulo }}</h5>
                            </div>
                        </div>
                        @php
                            $control++;
                        @endphp
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="row mb-3 mt-4">
        <div class="col-12 col-md-8 pl-5 pr-3 pt-1 pb-1">
            <div class="slider_fincas">
                <div class="move">
                    @foreach ($fincas as $finca)
                        <div class="box">
                            <img src="{{ asset('imagenes/sistema/logos/' . $finca->logo) }}"
                                style="width: 250px;height: 100px;" alt="">
                        </div>
                    @endforeach
                    <!-- 2da vuelta -->
                    @foreach ($fincas as $finca)
                        <div class="box">
                            <img src="{{ asset('imagenes/sistema/logos/' . $finca->logo) }}"
                                style="width: 250px;height: 100px;" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="row pt-3 mt-3">
                <div class="col-12 pl-4 text-center">
                    <h6 style="font-size: 16pt; font-weight: bold; color: grey;">Solicita Información</h6>
                </div>
                <div class="col-12 pl-4 text-center">
                    <a href="https://api.whatsapp.com/send?phone=573102295019&amp;text=Hola%20requiero%20información%20del%20Grupo%20G8" target="_blank"><img src="{{ asset('imagenes/sistema/whatsapp-icon.png') }}" border="0" alt="" width="57" height="57"></a>
                </div>
            </div>
        </div>
    </div>
@endsection

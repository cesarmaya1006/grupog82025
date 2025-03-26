@extends('extranet.layout.app')
@section('css_pagina')
<link rel="stylesheet" href="{{asset('css/extranet/nuestras/nuestras.css')}}">
@endsection
@php
    $texto = "Some 60 years ago, a number of elements converged and gave way to one of the most emblematic, significant, and representative industries for the Colombian agricultural sector.

A number of businessmen, who are also FRIENDS and share an all-encompassing vision, found in the Colombian flowers a business opportunity thanks to its great diversity, the country's privileged geographical location on the northern part of South America, the great variety of climates, the amount of sunlight, and the fertility of the Bogota savanna soil with vast natural water sources, all of these being unbeatable conditions for the production of excellent quality flowers.

As with every business, this industry's consolidation has brought significant challenges for these businessmen in terms of developing the best possible agricultural practices, new varieties, proper packing, and the most efficient distribution and trading channels to allow reaching the entire world with a very high quality product.

Step-by-step, a corporate class that had decided to conquer the world came to be, having to tackle all types of challenges in time, in spite of this having gained a position and recognition in the most demanding markets in terms of quality and services.

It is so that G-8 was born 15 years ago, this being a group of friendly farms sharing similar corporate philosophies, with more than 20 years in the market, members of Asocolflores, 6,000 direct employees, a Florverde sustainable flowers certification, focused on quality and service, their initial challenge having been finding an efficient raw materials purchasing option. The model has allowed this group to consolidate and gain a significant recognition and the best possible reputation in the local market.

Looking to continue strengthening the group at an international level, the decision was made to take an additional step to promote our flowers and make available to the world markets (North America, Europe, Asia, and Oceania) POSSIBLY THE BEST FLOWERS IN THE WORLD, with 500 cultivated hectares, a large number of products with more than 400 varieties endorsed by significant recognitions and awards in international fairs such as IPM – Essen, IFEX – Japan, PROFLORA – Colombia, WF&FSA/SAF - USA, Flower EXPO - Rusia, IPM - Hortiflorexpo - China, IFTF - Holland / International Grower of the Year 2018 – AIPH.";
@endphp

@section('cuerpoPagina')
<div class="row d-flex justify-content-center" style="min-height: 55vh;">
    <div class="col-4 col-md-1 col-lg-1 d-flex justify-content-center pt-5">
        <h3 class="vertical">HISTORIA</h3>
    </div>
    <div class="col-8 col-md-4 col-lg-4 pt-5">
        <p align="justify">Posted on Saturday, 30th of May 2020 03:52:15 PM</p>
        <br>
        <?php $parrafos = explode(".", $texto); ?>
        @foreach ($parrafos as $parrafo)
        <p align="justify">{{$parrafo.'.'}}</p>
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

@extends('layouts.app')
@section('pageTitle', 'Home')
@section('content')
    <div class="py-16 container">
        <div class="w-full flex justify-between">
            <div class="w-7/12">
                <h1>
                    {{ $title }}
                </h1>
                <p class="mt-4">
                    Welkom bij de Legoland Doetinchem website. Op deze website kun je informatie vinden over Legoland Doetinchem, je kunt tickets bestellen of je inschrijven voor de nieuwsbrief. Mocht je nog meer vragen hebben dan hebben wij ook een contact pagina.
                </p>
            </div>
            <div class="w-5/12">
               <img src="{{ asset('images/legoland_home.jpg')  }}" />
            </div>
        </div>
        <h2>
            Bekijk hier de kaartjes
        </h2>
        <swiper
            :slides="{{ json_encode(\App\Models\Ticket::all()) }}"
            :property="'c-card__single'"
            class="mt-4"
            ref="mySwiperRef"
        >

        </swiper>
    </div>
@endsection

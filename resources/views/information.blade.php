@extends('layouts.app')
@section('pageTitle', 'Informatie')
@section('content')
    <div class="py-16 container">
        <div class="w-full flex justify-between">
            <div class="w-7/12">
                <h1>
                    {{ $title }}
                </h1>
                <p class="mt-4">
                    Welkom bij de Legoland Doetinchem website. Op deze pagina vindt je net wat meer informatie over Legoland Doetinchem!
                </p>
            </div>
            <div class="w-5/12">
                <img src="{{ asset('images/legoland_home.jpg')  }}" />
            </div>
        </div>
        <div class="mt-8">
            <p>
                Legoland Doetinchem probeert u een leuke dag te bezorgen voor weinig geld! Wij proberen om een lach op iedereen zijn gezicht te krijgen. U zult wel wat meer vragen hebben over waar u bijvoorbeeld kaartjes kunt kopen. Dat kan namelijk <a href="/tickets">hier.</a> Voor meer vragen ga naar de <a onclick="document.getElementById('veelgestelde-vragen').scrollIntoView()" href="#veelgestelde-vragen">Veelgestelde vragen sectie.</a> Mocht uw vraag er niet tussen staan dan verzoek ik u graag om contact met ons op te nemen op de <a href="/contact">contact</a> pagina.
            </p>
        </div>
        <h2 id="veelgestelde-vragen" class="mt-8">
            Veel gestelde vragen:
        </h2>
        <div class="w-full flex justify-between">
            <div class="c-card__single w-3/12">
                <p class="font-bold">
                    Wat is Legoland Doetinchem?
                </p>
                <p>
                    Legoland Doetinchem is een gezellig pretpark waar je in veel attracties kunt.
                </p>
            </div>
            <div class="c-card__single w-3/12">
                <p class="font-bold">
                    Wat doet Legoland Doetinchem?
                </p>
                <p>
                    Legoland Doetinchem probeert jou een hele leuke dag te bezorgen met de vele activiteiten die wij bieden.
                </p>
            </div>
            <div class="c-card__single w-3/12">
                <p class="font-bold">
                    Waar ligt Legoland Doetinchem?
                </p>
                <p>
                    Legoland Doetinchem ligt in Doetinchem aan de John F Kennedylaan naast het Graafschap College hoofdgebouw.
                </p>
            </div>
        </div>
    </div>
@endsection

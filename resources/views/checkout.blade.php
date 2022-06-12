@extends('layouts.app')
@section('pageTitle', 'Afrekenen')
@section('content')
    <div class="py-16 container">
        <h1 class="mb-4">
            {{ $title }}
        </h1>
        <a href="/cart" class="c-button c-button__default">
            Naar winkelmandje
        </a>
        <div class="c-cart__checkout mt-4">
            <p>
                U ontvangt de tickets per mail direct na de aankoop. Vandaar dat wij uw mailadres nodig hebben.
            </p>
            @php($total = 0)
            @if($products)
                <h2>
                    Producten:
                </h2>
                @for($i = 0; $i<count($amount); $i++)
                    @include('components/cart-single-product', ['ticket' => $products[$i], 'amount' => $amount[$i]])
                    @php($total += $products[$i]->price*$amount[$i])
                @endfor
                <update-cart class="mt-4">
                </update-cart>
                @if(!auth()->check())
                    <p class="text-red-500">
                        U bent momenteel niet ingelogd. U kunt <a href="/inloggen">hier</a> registreren en/of inloggen.
                        U kunt ook verder gaan met uw bestelling.
                    </p>
                @endif
                <form action="/betalen/send" method="post" class="mt-4 flex">
                    @csrf
                    <div class="w-2/12">
                        <div class="inputRow mt-4">
                            <label for="name">Naam</label>
                        </div>
                        <div class="inputRow mt-4">
                            <label for="email">Email</label>
                        </div>
                        <div class="inputRow mt-4">
                            <p>
                                Totaalprijs: €{{ $total }}
                            </p>
                        </div>
                    </div>
                    <div class="w-2/12 flex flex-col">
                        <input class="mt-4" type="text" name="name">
                        <input class="mt-4" type="email" name="email">
                        <input class="mt-4" type="hidden" name="price" value="{{ $total }}">
                        <input class="mt-4" type="hidden" name="userid" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                        <input class="mt-4 c-button c-button__default cursor-pointer" type="submit" name="sendPayment" value="Betalen">
                    </div>
                </form>
            @else
                <div class="c-cart__single">
                    <p>
                        Sorry, u heeft nog geen producten geselecteerd ga naar de <a href="/tickets">tickets</a> pagina om producten toe te voegen.
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection

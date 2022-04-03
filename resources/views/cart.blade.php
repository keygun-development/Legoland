@extends('layouts.app')
@section('pageTitle', 'Winkelmandje')
@section('content')
    <div class="py-16 container">
        <h1>
            {{ $title }}
        </h1>
        <div class="c-cart">
            @php($total = 0)
            @if($products)
                @for($i = 0; $i<count($amount); $i++)
                    @include('components/cart-single-product', ['ticket' => $products[$i], 'amount' => $amount[$i]])
                    @php($total += $products[$i]->price*$amount[$i])
                @endfor
            @else
                <div class="c-cart__single">
                    <p>
                        Sorry, u heeft nog geen producten geselecteerd ga naar de <a href="/tickets">tickets</a> pagina om producten toe te voegen.
                    </p>
                </div>
            @endif
            <update-cart class="mt-4">
            </update-cart>
            <div class="flex justify-between items-end mt-4">
                <p>
                    Totaal: €{{ $total }}
                </p>
                <a href="/betalen" class="c-button c-button__default">
                    Naar betalen
                </a>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('pageTitle', 'Account dashboard')
@section('content')
    <div class="py-16 container">
        <div class="c-cart__single">
            <a href="/account/orders">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Terug naar bestellingen
            </a>
            <p>
                Naam: {{ $order->name }}
            </p>
            <p>
                E-mail: {{ $order->email }}
            </p>
            <h2>
                Kaarten:
            </h2>
            @php($tickets = json_decode($order->tickets))
            @foreach($tickets as $ticket)
                @php($single = \App\Models\Ticket::getTicketByID($ticket->id))
                @foreach($single as $singleticket)
                    <div class="my-4">
                        @include('components.card-single-ticket', ['ticket' => $singleticket])
                    </div>
                @endforeach
            @endforeach
            <p>
                Totaalprijs: €{{ $order->price }}
            </p>
            <p>
                Bij retourneren van de kaart(en) graag <a href="/contact">contact</a> opnemen.
            </p>
        </div>
    </div>
@endsection

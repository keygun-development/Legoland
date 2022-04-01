@extends('layouts.app')
@section('pageTitle', 'Tickets')
@section('content')
    <div class="py-16 container">
        <h1>
            {{ $title }}
        </h1>
        <p>
            Schrijf je in voor de nieuwsbrief en ontvang wekelijks updates
        </p>
        <form class="mt-4" action="/nieuwsbrief/send" method="post">
            @csrf
            <div class="inputRow">
                <label for="name">Naam</label>
                <input class="mt-4 ml-4" type="text" name="name">
            </div>
            <div class="inputRow">
                <label for="email">Email</label>
                <input class="mt-4 ml-4" type="email" name="email">
            </div>
            <div class="inputRow">
                <input class="c-button c-button__default cursor-pointer mt-4" type="submit" name="sendNieuwsbrief" value="Verzenden">
            </div>
        </form>
    </div>
@endsection

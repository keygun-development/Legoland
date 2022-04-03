@extends('layouts.app')
@section('pageTitle', 'Tickets')
@section('content')
    <div class="py-16 container">
        <h1>
            {{ $title }}
        </h1>
        <p>
            Schrijf je in voor de nieuwsbrief en ontvang wekelijks updates, kortingen en meer.
        </p>
        <form class="flex w-full" action="/nieuwsbrief/send" method="post">
            @csrf
            <div class="w-1/12">
                <div class="inputRow mt-4">
                    <label for="name">Naam</label>
                </div>
                <div class="inputRow mt-4">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="w-2/12">
                <input class="mt-4" type="text" name="name">
                <input class="mt-4" type="email" name="email">
                <input class="c-button c-button__default cursor-pointer mt-4" type="submit" name="sendNieuwsbrief" value="Verzenden">
            </div>
        </form>

        @if (session('success'))
            <p class="text-lime-500">
                {{ session('success') }}
            </p>
        @endif
        @if (session('error'))
            <p class="text-red-500">
                {{ session('error') }}
            </p>
        @endif
    </div>
@endsection

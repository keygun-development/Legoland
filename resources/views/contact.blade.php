@extends('layouts.app')
@section('pageTitle', 'Contact')
@section('content')
    <div class="py-16 container">
        <h1>
            {{ $title }}
        </h1>
        <p>
            Heeft u een vraag? Stel ons uw vraag en wij zullen zo spoedig mogelijk antwoorden.
        </p>
        <form action="/contact/send" method="post" class="flex w-full">
            @csrf
            <div class="w-1/12">
                <div class="inputRow mt-4">
                    <label for="name">Naam</label>
                </div>
                <div class="inputRow mt-4">
                    <label for="email">Email</label>
                </div>
                <div class="inputRow mt-4">
                    <label for="message">Bericht</label>
                </div>
            </div>
            <div class="w-2/12 flex flex-col">
                <input class="mt-4" type="text" name="name">
                <input class="mt-4" type="email" name="email">
                <textarea class="mt-4" name="message"></textarea>
                <input class="mt-4 c-button c-button__default cursor-pointer" type="submit" name="sendContact" value="Verzenden">
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

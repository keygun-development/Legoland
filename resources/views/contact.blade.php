@extends('layouts.app')
@section('pageTitle', 'Contact')
@section('content')
    <div class="py-16 container">
        <h1>
            {{ $title }}
        </h1>
        <form action="/contact/send" method="post">
            @csrf
            <div class="inputRow mt-4">
                <label for="name">Naam</label>
                <input class="ml-4" type="text" name="name">
            </div>
            <div class="inputRow mt-4">
                <label for="email">Email</label>
                <input class="ml-4" type="email" name="email">
            </div>
            <div class="inputRow mt-4">
                <label for="message">Bericht</label>
                <textarea class="ml-4" name="message"></textarea>
            </div>
            <div class="inputRow">
                <input class="c-button c-button__default cursor-pointer" type="submit" name="sendContact" value="Verzenden">
            </div>
        </form>
    </div>
@endsection

@extends('layouts.app')
@section('pageTitle', 'Contact')
@section('content')
    <form action="/contact/send" method="post">
        @csrf
        <div class="inputRow">
            <label for="name">Naam</label>
            <input type="text" name="name">
        </div>
        <div class="inputRow">
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div class="inputRow">
            <label for="message">Bericht</label>
            <textarea name="message"></textarea>
        </div>
        <div class="inputRow">
            <input type="submit" name="sendContact" value="Verzenden">
        </div>
    </form>
@endsection

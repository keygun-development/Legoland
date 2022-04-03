@extends('layouts.app')
@section('pageTitle', 'Afrekenen')
@section('content')
    <div class="py-16 container">
        <h1 class="mb-4">
            {{ $title }}
        </h1>
        <p class="mb-4">
            Bedankt voor uw betaling binnen enkele ogenblikken ontvangt u van ons een mail met daarin de ticket details.
        </p>
        <a href="/" class="c-button c-button__default">
            Terug naar home
        </a>
    </div>
@endsection

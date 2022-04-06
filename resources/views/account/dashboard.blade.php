@extends('layouts.app')
@section('pageTitle', 'Account dashboard')
@section('content')
    <div class="py-16 container">
        <h1>
            {{ $title }}
        </h1>
        @if (session('success'))
            <p class="text-lime-500">
                {{ session('success') }}
            </p>
        @endif
        <div class="flex mt-4">
            <div class="w-2/12 flex flex-col">
                <a class="c-button c-button__account" href="/account/orders">
                    <i class="fas fa-list"></i>
                    Mijn bestellingen
                </a>
                <a class="c-button c-button__account" href="/account/settings">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    Mijn gegevens
                </a>
                <a class="c-button c-button__account" href="/account/logout">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Uitloggen
                </a>
            </div>
        </div>
    </div>
@endsection

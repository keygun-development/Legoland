@extends('layouts.app')
@section('pageTitle', 'Account dashboard')
@section('content')
    <div class="py-16 container">
        <h1>
            {{ $title }}
        </h1>
        <a href="/account/dashboard">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Terug naar dashboard
        </a>
        <div class="w-full flex flex-col mt-4">
            <form action="/account/settings/update" method="post">
                @csrf
                <div>
                    <p>
                        Naam:
                    </p>
                    <input type="text" name="name" value="{{ $user->name }}" />
                </div>
                <div class="mt-4">
                    <p>
                        Email:
                    </p>
                    <input type="email" name="email" value="{{ $user->email }}" />
                </div>
                <div class="mt-4">
                    <input type="submit" class="c-button c-button__default cursor-pointer" value="Updaten" />
                </div>
            </form>
            @if (session('success'))
                <p class="text-lime-500 mt-4">
                    {{ session('success') }}
                </p>
            @endif
        </div>
    </div>
@endsection

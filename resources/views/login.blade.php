@extends('layouts.app')
@section('pageTitle', 'Inloggen/Registreren')
@section('content')
    <div class="py-16 container">
        <h1>
            Inloggen
        </h1>
        @include('components.authenticate', ['hasaccount' => true])
    </div>
@endsection

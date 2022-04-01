@extends('layouts.app')
@section('pageTitle', 'Tickets')
@section('content')
    <div class="py-16 container">
        <h1>
            {{ $title }}
        </h1>
        <div class="grid grid-cols-4 gap-4">
            @foreach($tickets as $ticket)
                @include('components.card-single-ticket', ['ticket' => $ticket])
            @endforeach
        </div>
    </div>
@endsection

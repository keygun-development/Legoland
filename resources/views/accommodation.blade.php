@extends('layouts.app')
@section('pageTitle', 'Accommodaties')
@section('content')
    <div class="py-16 container">
        <h1>
            {{ $title }}
        </h1>
        <div class="grid grid-cols-2 gap-4">
            @each('components.card-single-accommodation', $accommodations, 'item')
        </div>
    </div>
@endsection


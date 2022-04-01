@extends('layouts.app')
@section('pageTitle', 'Contact')
@section('content')
    <div class="py-16 container">
        <h1>
            {{ $title }}
        </h1>
        <div class="c-cart">
            {{ $products }}
        </div>
    </div>
@endsection

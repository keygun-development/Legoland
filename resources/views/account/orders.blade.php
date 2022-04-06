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
            @if($orders)
                @foreach($orders as $order)
                    @include('components.order-single', ['order' => $order])
                @endforeach
            @else
                <p>
                    U heeft nog geen bestelling gedaan.
                </p>
            @endif
        </div>
    </div>
@endsection

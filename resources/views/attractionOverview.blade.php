@extends('layouts.app')
@section('pageTitle', 'Attracties')
@section('content')
    <div class="py-16 container">
        <h1>
            {{ $title }}
        </h1>
        <div class="grid grid-cols-2 gap-4">
            @foreach($attractions as $attraction)
                <div class="border-solid border-2 border-black grid grid-cols-2 gap-3 rounded-lg">
                    <div>
                        <img class="rounded-tl-lg rounded-rl-lg" style="height: 100%;" src="{{ asset($attraction->imageUrl) }}">
                    </div>
                    <div>
                        <h1 class="underline">{{ $attraction->name }}</h1>
                        <p class="mt-2">{{ $attraction->description }}</p>
                        <div class="flex space-x-2 mt-6 w-full">
                            <a href="/attracties/{{ $attraction->id }}" class="c-button c-button__default c-button__attraction w-11/12">
                                More info
                            </a>
                        </div>
                        <br>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('pageTitle', 'Attractie details')
@section('content')
    <div class="py-16 container">
        <a class="text-[#7E7E7E] underline" href="/attracties">
            Attracties >> Attractie 1
        </a>
        <h1 class="mt-12">
            Attractie 1
        </h1>
        <div class="flex w-full justify-between mt-8">
            <div class="w-5/12">
                <img class="c-image__rounded" src="{{ asset('images/achtbaan.jpg') }}" />
            </div>
            <div class="w-6/12">
                bla
            </div>
        </div>
    </div>
@endsection

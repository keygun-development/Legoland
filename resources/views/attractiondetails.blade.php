@extends('layouts.app')
@section('pageTitle', 'Attractie details')
@section('content')
    <?php
    $details = json_decode($attraction->details, true);
    ?>
    <div class="py-16 container">
        <a class="text-[#7E7E7E] underline" href="/attracties">
            Attracties >> {{ $attraction->name }}
        </a>
        <h1 class="mt-12">
            {{ $attraction->name }}
        </h1>
        <div class="flex w-full justify-between mt-8">
            <div class="w-5/12">
                <img class="c-image__rounded" src="{{ $attraction->imageUrl }}" />
            </div>
            <div class="w-6/12">
                {{ $attraction->description }}

                <div class="box-border">
                    <h2 class="mt-8">
                        Details
                    </h2>
                    <ul>
                        @foreach($details as $detail)
                            <li>
                                {{ $detail['name'] }}: @if($detail['value'] === true)
                                    Ja
                                @else
                                    {{ $detail['value'] }}
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

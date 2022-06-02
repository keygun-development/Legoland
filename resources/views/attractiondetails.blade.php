@extends('layouts.app')
@section('pageTitle', 'Attractie details')
@section('content')
    <?php
    $details = json_decode($attraction->getDetails(), true);
    ?>
    <div class="py-16 container">
        <a class="text-[#7E7E7E] underline" href="/attracties">
            Attracties >> {{ $attraction->getName() }}
        </a>
        @include('components.details', ['item' => $attraction, 'details' => $details])
    </div>
@endsection

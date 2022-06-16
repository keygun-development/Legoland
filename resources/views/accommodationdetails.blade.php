@extends('layouts.app')
@section('pageTitle', 'Attractie details')
@section('content')
    <?php
    $details = json_decode($accommodation->details, true);
    ?>
    <div class="py-16 container">
        <a class="text-[#7E7E7E] underline" href="/accommodation">
            Accommodatie >> {{ $accommodation->name }}
        </a>
        @include('components.details', ['item' => $accommodation, 'details' => $details])
    </div>
@endsection

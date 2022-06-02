@extends('layouts.app')
@section('pageTitle', 'Attractie details')
@section('content')
    <?php
    $details = json_decode($accommodation->getDetails(), true);
    ?>
    <div class="py-16 container">
        <a class="text-[#7E7E7E] underline" href="/accommodation">
            Accommodatie >> {{ $accommodation->getName() }}
        </a>
        @include('components.details', ['item' => $accommodation, 'details' => $details])
    </div>
@endsection

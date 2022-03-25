<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="{{ asset('styles/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @extends('layouts.app')
        @section('content')
            {{ $name }}
        @endsection
    </body>
</html>
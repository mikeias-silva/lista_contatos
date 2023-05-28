<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name') }}</title>

    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:locale" content="{{ config('app.locale') }}"/>
    <meta name="description" content="My Contact List"/>
    <meta property="og:site_name" content="{{ config('app.name') }}"/>

    <meta name="author" content="Mikeias Silva <mikeias26@gmail.com>">
    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png">


    <!-- CSRF Token -->
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">--}}
</head>

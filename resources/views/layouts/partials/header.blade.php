<!doctype html>
<html ng-app="app.init">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">

    <title>UUID namespace manager</title>

    {{-- Include all the essentials --}}
    @include('layouts.partials_meta.favicons')
    @include('layouts.partials_meta.stylesheets')
    @include('layouts.partials_meta.scripts')

    {{-- CSRF Protection --}}
    <meta name="xsrf-token" ng-init="xsrf_token('{{ csrf_token() }}')">
</head>
<body>

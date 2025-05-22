<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dim">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="icon" type="image/x-icon" href="favicon.svg">
</head>
<body class="min-h-screen px-4 sm:px-8 font-mono antialiased bg-base-200/50 dark:bg-base-200">
    <div class="max-w-screen-xl mx-auto">
        {{ $slot }}
    </div>

    <x-toast />

    @if(config('app.version'))
        <div class="fixed left-2 bottom-2 opacity-50">v{{ config('app.version') }}</div>
    @endif
</body>
</html>

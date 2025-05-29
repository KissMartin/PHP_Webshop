<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-900 text-black overflow-x-hidden">
        {{-- <x-navbar/> --}}
        <div class="bg-gradient-to-b from-[rgba(0,0,0,0.8)] from-30 to-transparent text-white p-4 fixed w-screen top-0 left-0 z-40">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-2xl font-bold"><a href="/" class="py-2 px-5 hover:text-gray-400">HoneyHive</a></h1>
            </div>
        </div>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg drop-shadow-xl drop-shadow-gray-900">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

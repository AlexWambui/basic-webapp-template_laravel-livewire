<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <x-vite-resources />

        <title>{{ config('app.name', 'Aaqil Softwares') }}</title>
    </head>
    <body>
        <livewire:partials.navbar />

        <livewire:partials.flash-messages />

        <main class="guest_app">
            {{ $slot }}
        </main>

        <livewire:partials.footer />
    </body>
</html>

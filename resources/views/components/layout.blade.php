<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark bg-base-300 h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Cinema Ticket Booker</title>
</head>
<body class="flex flex-col justify-between h-full">
    <div>
        <x-navbar />
        
        {{-- Main content --}}
        <div class="p-4 {{ $styles ?? '' }}">
            {{ $slot }}
        </div>
    </div>

    <x-footer />
</body>
</html>
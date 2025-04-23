<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Suggestions' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-gray-800 text-white">
        <header>
            <nav class="w-[95%] max-w-[1000px] mx-auto flex justify-between items-center">
                <a href="{{ route('home.index') }}" class="text-2xl font-bold">
                    Suggestions
                </a>
            </nav>
        </header>
        <main class="w-[95%] max-w-[1000px] mx-auto">
        {{ $slot }}
        </main>
        <footer>
            <div class="w-[95%] max-w-[1000px] mx-auto">
                Suggestions App
            </div>
        </footer>
    </body>
</html>

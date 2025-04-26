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
    <body class="bg-gray-900 text-white min-h-screen">
        <header class="py-4">
            <nav class="w-[95%] max-w-[750px] mx-auto flex justify-between items-center">
                <a href="{{ route('home.index') }}" class="text-2xl font-bold">
                    Suggestions
                </a>
                @auth
                    <div class="flex items-center gap-x-4">
                        <p>{{ auth()->user()->email }}</p>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-white bg-blue-800 hover:bg-blue-700 text-sm font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <div class="flex items-center gap-x-4">
                        <a href="{{ route('login') }}" class="text-white bg-blue-800 hover:bg-blue-700 text-sm font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="text-white bg-blue-800 hover:bg-blue-700 text-sm font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">
                            Register
                        </a>
                    </div>
                @endauth
            </nav>
        </header>
        <main class="w-[95%] max-w-[750px] mx-auto bg-gray-600 divide-y-2 divide-gray-400 rounded-md overflow-hidden">
            <header class="p-4">
                <nav class="flex gap-x-4">
                    <a href="/" class="py-3 px-4 bg-transparent text-gray-200 text-sm font-light rounded-sm cursor-pointer hover:bg-gray-700">
                        Working On
                    </a>
                    <a href="/" class="py-3 px-4 bg-transparent text-gray-200 text-sm font-light rounded-sm cursor-pointer hover:bg-gray-700">
                        Finished
                    </a>
                </nav>
            </header>
            {{ $slot }}
        </main>
        <footer>
            <div class="w-[95%] max-w-[750px] mx-auto">
                Suggestions App
            </div>
        </footer>
    </body>
</html>

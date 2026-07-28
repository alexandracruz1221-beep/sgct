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
        @php
            $host = $_SERVER['HTTP_HOST'] ?? (request()->getHost() ?? '');
        @endphp
        @if(app()->environment('local') && ! str_contains($host, 'app.github.dev'))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        <!-- Tailwind CDN (always included as a safe fallback in preview/dev) -->
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            /* Constrain very large SVGs on auth pages */
            .auth-logo svg { max-width: 160px; height: auto; }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex bg-gray-100">
            @include('layouts.sidebar')

            <div class="flex-1 min-h-screen">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="p-6">
                    @isset($slot)
                        {{ $slot }}
                    @elseif(View::hasSection('content'))
                        @yield('content')
                    @else
                        {{-- No content provided --}}
                    @endisset
                </main>
            </div>
        </div>
    </body>
</html>

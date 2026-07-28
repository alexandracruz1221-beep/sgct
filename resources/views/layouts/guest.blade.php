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
        <!-- Tailwind CDN fallback -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans text-slate-900 antialiased">
        <div class="relative min-h-screen overflow-hidden bg-slate-950">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(99,102,241,0.25),_transparent_40%),radial-gradient(circle_at_bottom_right,_rgba(16,185,129,0.18),_transparent_35%)]"></div>

            <div class="relative flex min-h-screen flex-col items-center justify-center px-4 py-10 sm:px-6 lg:px-8">
                <div class="mb-6 text-center">
                    <a href="/" class="inline-flex items-center rounded-full border border-white/20 bg-white/85 px-4 py-2 shadow-lg shadow-slate-950/10 backdrop-blur">
                        <span class="mr-3 flex h-10 w-10 items-center justify-center rounded-full bg-indigo-600 text-sm font-semibold text-white">SG</span>
                        <span class="text-sm font-semibold text-slate-700">Sistema de Gestión de Centros</span>
                    </a>
                </div>

                <div class="w-full max-w-md overflow-hidden rounded-3xl border border-slate-200/80 bg-white/95 p-8 shadow-2xl shadow-slate-950/10 backdrop-blur">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>

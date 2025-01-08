<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Bookclubs provides a place for bookclub communities to share their book reviews and thoughts.">
    
    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}" />
    <meta property="og:description" content="Bookclubs provides a place for bookclub communities to share their book reviews and thoughts." />

    <meta name="twitter:title" content="{{ config('app.name', 'Laravel') }}" />
    <meta name="twitter:description" content="Bookclubs provides a place for bookclub communities to share their book reviews and thoughts." />
    <meta name="twitter:url" content="{{ url()->current() }}" />

    <link rel="canonical" href="{{ url()->current() }}" />

    <meta name="robots" content="noindex, nofollow" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-green-100">
        @include('components.layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
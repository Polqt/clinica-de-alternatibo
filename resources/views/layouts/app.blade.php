<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Medicare' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
</head>

<body>
    <div class="min-h-screen">
        @include('layouts.partials.header')

        <main>
            @yield('content')
        </main>

        @include('layouts.partials.footer')
    </div>
    @fluxScripts
</body>

</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold underline">
                Hello world!
            </h1>
            <p class="text-lg">This is a sample Laravel application.</p>
        </div>
    </body>
</html>
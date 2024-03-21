<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')
    <title>CarShop - @yield('titulo')</title>
    @stack('styles')
</head>
<body>
    @include('partials.header')

    <main class="container mx-auto mt-5">
        <h2 class="text-3xl font-bold mb-5 text-center">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>
    
    @include('partials.footer')
    @stack('sweetAlert')
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite(['resources/css/menu.css', 'resources/js/menu.js'])

    @stack('styles')
</head>
<body>
    
    @include('menu.nav')

    <main>
        @yield('content')
    </main>




    @stack('scripts')
</body>
</html>
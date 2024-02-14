<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <script src="{{ asset('js/dist/axios.min.js') }}"></script>
        <script src="{{ asset('js/dist/sweetalert2.js') }}"></script>
        <script src="{{ asset('js/popup.js') }}"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        @yield('scripts')
    </head>
    <body>
        <div class="container mx-auto">
            
            @yield('content')
        </div>
    </body>
</html>
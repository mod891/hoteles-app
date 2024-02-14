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
            <div class="flex flex-row ">
    
                <div class="flex flex-col bg-cyan-600 w-0 md:w-1/5">
                    <!-- menu columna md:expanded sm:collapsed
                        visitados | reservas | favoritos
                    -->
                </div>
        
                <div class="flex flex-col w-full text-center md:w-3/5"><!--   w-full md:flex md:flex-col sm:w-7 md:w-16 lg:w-1/2 xl:w-full   -->
                    <div id="header" > <!-- logo vectorial -->
                        <div class="bg-sky-400" style="height:200px; width:100%"></div>
                    </div>
                    <!-- buscador habitaciones / provincia / municipio
                        + checkbox caracteristicas -->
                                                                    
                    @yield('content')
                 
                </div>

                <div class="flex flex-col bg-cyan-600 sm:w-0 md:w-1/5">
                    
                </div>

            </div>

            
        </div>
    </body>
</html>
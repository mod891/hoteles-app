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
    <body class="">
        <div class="container mx-auto">
            <div class="flex flex-row ">

                <div class="flex flex-col bg-cyan-600 w-0 md:w-1/5">
      
                </div>
        
                <div class="flex flex-col w-full text-center md:w-3/5"><!--   w-full md:flex md:flex-col sm:w-7 md:w-16 lg:w-1/2 xl:w-full   -->
                    
                    <div id="header" > <!-- logo vectorial -->
                        <div class="bg-sky-400 w-full" style="height:200px;"></div>
                    </div>
                    <div class="lg:invisible sticky top-0">
                        <button id="toggleMenu" class=" block text-gray-800 focus:outline-none">
                            <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <div id="menu" class="invisible lg:visible bg-gray-200 sticky top-8 -translate-y-8 py-4">
                        <ul class="flex lg:flex-row flex-col justify-around ">
                            <li id="closeMenu" class="lg:invisible" style="align-self: flex-end;"><a href="#"  class=" py-2 px-4 text-gray-800 hover:bg-gray-300">x</a></li>
                            <li><a href="{{ route('user.inicio') }}" class=" py-2 px-4 text-gray-800 hover:bg-gray-300">Inicio</a></li>
                            <li><a href="{{ route('user.reservas') }}" class=" py-2 px-4 text-gray-800 hover:bg-gray-300">Reservas</a></li>
                            <li><a href="{{ route('user.favoritos') }}" class=" py-2 px-4 text-gray-800 hover:bg-gray-300">Favoritos</a></li>
                            <li><a href="{{ route('user.visitados') }}" class=" py-2 px-4 text-gray-800 hover:bg-gray-300">Visitados</a></li>
                            @auth
                            <li><a href="{{ route('logout') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log out</a></li>
                            @endauth
                        </ul>
                    </div>
                    

                    <!-- buscador habitaciones / provincia / municipio
                        + checkbox caracteristicas -->
                                                                    
                    @yield('content')
                    
                </div>

                <div class="flex flex-col bg-cyan-600 sm:w-0 md:w-1/5">
                    
                </div>

            </div>
            <div class="flex flex-row h-56 bg-sky-400">

            </div>
            
        </div>
        <script defer>
            var btnMenu = document.getElementById('toggleMenu')
            var menu = document.getElementById('menu')
            var closeMenu = document.getElementById('closeMenu')
            btnMenu.addEventListener('click', () => {
                menu.classList.toggle('invisible');
            });
            closeMenu.addEventListener('click', () => {
                menu.classList.toggle('invisible');
            });
        </script>
    </body>
</html>
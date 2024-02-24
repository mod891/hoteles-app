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
        <style>
            @font-face {
            font-family: 'font1';
            src: url('{{URL::asset("/public/fonts/font1.tff")}}');
            }
            html {
                font-family: font1;
            }
        </style>
        @yield('scripts')
    </head>
    <body class="bg-slate-50"  class="">
        <div class="w-full mx-auto">
            <div class="flex flex-row ">

                <div style="background-color: var(--color1);" class="flex flex-col  w-0 md:w-1/5">
      
                </div>
        
                <div class="flex flex-col w-full text-center md:w-3/5"><!--bg-cyan-600   w-full md:flex md:flex-col sm:w-7 md:w-16 lg:w-1/2 xl:w-full   -->
                    
                    <div id="header" > 
                        <!-- logo vectorial  -->
                        <div class="w-full" style="background-color: var(--color2); height:200px;">
                            <img class="mx-auto py-8" src="{{ asset('images/logo.svg') }}"></img>
                        </div>
                    </div>
                    <div class="lg:hidden sticky top-0">
                        <button id="toggleMenu" class=" block text-gray-800 focus:outline-none">
                            <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <div id="menu" style="background-color: var(--color3);" class="hidden lg:block sticky top-8 -translate-y-8 py-4">
                        <ul class="flex lg:flex-row flex-col justify-around ">
                            @auth
                            <li id="closeMenu" class="lg:hidden" style="align-self: flex-end;"><a href="#"  class=" py-2 px-4 text-gray-800 hover:bg-gray-300">x</a></li>
                            @if(Auth::user()->rol != 'admin')
                            <li><a href="{{ route('user.inicio') }}" class=" py-2 px-4 text-gray-800 hover:bg-gray-300">Inicio</a></li>
                            <li><a href="{{ route('user.reservas') }}" class=" py-2 px-4 text-gray-800 hover:bg-gray-300">Reservas</a></li>
                            <li><a href="{{ route('user.favoritos') }}" class=" py-2 px-4 text-gray-800 hover:bg-gray-300">Favoritos</a></li>
                            <li><a href="{{ route('user.visitados') }}" class=" py-2 px-4 text-gray-800 hover:bg-gray-300">Visitados</a></li>
                            @endif
                            <li><a href="{{ route('logout') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log out</a></li>
                            @endauth
                        </ul>
                    </div>
                    

                    <!--begin contenido -->
                    @yield('content')
                    <!-- end contenido -->
                    <div style="background-color: var(--color2)" class="flex flex-row h-36 mt-16">

                    </div>
                </div>

                <div style="background-color: var(--color1);" class="flex flex-col sm:w-0 md:w-1/5">
                    
                </div>

            </div>
            
            
        </div>
        <script defer>
            var btnMenu = document.getElementById('toggleMenu')
            var menu = document.getElementById('menu')
            var closeMenu = document.getElementById('closeMenu')
            btnMenu.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
            closeMenu.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        </script>
    </body>
</html>
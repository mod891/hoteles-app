
@extends('layouts.base')

@section('title','inicio')

@section('scripts')
<script src="{{ asset('/js/views/user/inicio.js') }} " defer></script>
@endsection
@section('content')


@auth
    <a href="{{ route('logout') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log out</a>
@endauth

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
                                                           
      
        <div class="w-10/12 mx-auto" id="cards-container">
        </div>

    </div>

    <div class="flex flex-col bg-cyan-600 sm:w-0 md:w-1/5">
        
    </div>

</div>


@endsection
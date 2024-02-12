
@extends('layouts.base')

@section('title','inicio')

@section('content')


@auth
    <a href="{{ route('logout') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log out</a>
@endauth

<div class="flex flex-row">
    
    <div class="flex flex-col">
        izq
        </div>
        
    <div class="flex flex-col w-16 md:w-32 lg:w-48"><!--w-full md:flex md:flex-col sm:w-7 md:w-16 lg:w-1/2 xl:w-full   -->
    Inicio
    </div>

<div class="flex flex-col">
    dcha
</div>

</div>
<x-card/>

@endsection
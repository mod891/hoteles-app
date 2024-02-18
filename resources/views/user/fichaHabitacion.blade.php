@extends('layouts.base2')

@section('title','Ficha de habitación')

@section('scripts')

<script src="{{ asset('js/dist/jquery.min.js') }} " ></script>
<script src="{{ asset('js/dist/moment.min.js') }} " ></script>
<script type="text/javascript" src="{{ asset('/js/dist/daterangepicker.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('/js/dist/daterangepicker.css') }} " />
<script src="{{ asset('/js/views/user/fichaHabitacion.js') }} " defer></script>

@endsection
@section('content')

<div>
<div id="main" class="m-4 w-full rounded-lg" >
    <div class="flex flex-row justify-center text-xl pt-4">
        Habitación hotel {{ $habitacion['nombre'] }}
    </div>
    <div class="flex flex-row">

        <div class="flex flex-col w-1/2 p-4">
            <img width="400px" src="{{ $habitacion['imagen'] }}" />
            <div  class=" mt-8" >
                <img id="fav" class="unfilled" src="/images/icons/unfilled.png" title="añadir a favoritos"></img>
            </div>
            <div class="hidden"><a target="_blank"  href="https://icons8.com/icon/87/heart">Heart</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a></div>
        </div>
        
        <div class="flex flex-col w-1/2 mt-4 xl:mt-12">
         
            <div class="flex flex-col xl:flex-row xl:mt-8 xl:text-xl">
                <strong><label class="mr-4">Descripción</label></strong>
                {{ $habitacion['descripcion'] }}   
                
            </div>
            <div class="flex flex-col xl:flex-row xl:mt-8 xl:text-xl">
                <strong><label class="mr-4">Municipio</label></strong>
                {{ $habitacion['municipio'] }}   
                
            </div>
            <div class="flex flex-col xl:flex-row xl:mt-8 xl:text-xl ">
                <strong><label class="mr-4">Provincia</label></strong>
                {{ $habitacion['provincia'] }}  
            </div>
            
        </div>    
    </div>
    <div class="text-2xl justify-center flex flex-row xl:-translate-y-8 xl:text-2xl">
        <div id="precio">{{ $habitacion['precio'] }} </div>€ noche 
    </div>

    <div id="divBtn" class="text-2xl justify-center flex flex-row xl:-translate-y-8 xl:text-2xl">
        <button id="startReserva" class="py-2 mt-8 px-5 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-75" id="hacerReserva">Reservar</button>  
    </div>
</div>

<div >
<div id="reservando" class="hidden" >

    <div id="dates" ><!-- advertir al usuario, doble click en un dia si es el mismo dia-->
        <label class="xl:text-2xl ">Seleccione la fecha de estancia</label><br>
        <input id="dtRange" />
    </div>
    <div class="mb-32">
        <p class="mt-8 mb-8" id="diasPrecio">-</p>
        <button id="cancelaReserva" class="py-2 mt-8 px-5 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-75" >Cancelar</button>  
        <button id="confirmaReserva" class="hidden py-2 mt-8 px-5 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-75" >Confirmar</button>  
    </div>
</div>
@endsection
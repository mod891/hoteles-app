@extends('layouts.base2')

@section('title','Ficha de hotel')

@section('scripts')

<script src="{{ asset('/js/views/user/fichaHotel.js') }} " defer></script>

@endsection
@section('content')

<div id="main" class=" w-full rounded-lg" >
    <div class="flex flex-row justify-center text-xl ">
        Hotel {{ $hotel['nombre'] }}
    </div>
    <div id="reserva-fecha" class="hidden flex flex-row justify-center text-xl ">
        
    </div>
    <div class="flex flex-row">

        <div class="flex flex-col w-1/2 p-4">
            <img width="400px" src="{{ $hotel['imagen'] }}" />
            <div  class=" mt-8" >
                <img id="fav" class="unfilled" src="/images/icons/unfilled.png" title="añadir a favoritos"></img>
            </div>
            <div class="hidden"><a target="_blank"  href="https://icons8.com/icon/87/heart">Heart</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a></div>
        </div>
        
        <div class="flex flex-col w-1/2 mt-4 xl:mt-12">
            
            <div class="flex flex-col xl:flex-row xl:mt-8 xl:text-xl">
                <strong><label class="mr-4">Municipio</label></strong>
                {{ $hotel['municipio'] }}   
                
            </div>
            <div class="flex flex-col xl:flex-row xl:mt-8 xl:text-xl ">
                <strong><label class="mr-4">Provincia</label></strong>
                {{ $hotel['provincia'] }}  
            </div>
            
            <div class="flex flex-col xl:flex-row xl:mt-8 xl:text-xl">
                <strong><label class="mr-4">Habitaciones</label></strong><br>
                    <div class="flex flex-row" id="habitacionesDelHotel">
                        <ul>
                        @for ($i = 0; $i < sizeof($hotel['habitaciones']); $i++)
                            <li>Habitacion {{ $hotel['habitaciones'][$i]['id'] }} - {{ $hotel['habitaciones'][$i]['precio'] }}€ </li>
                        @endfor
                        </ul>
                    </div>
                    <select class="hidden" id="habitaciones">
                        <option value="">Seleccione una habitacion</option>
                    </select>
                
            </div>
        </div>    
    </div>
    <div class="text-2xl justify-center flex flex-row xl:-translate-y-8 xl:text-2xl">
        <div id="precioTotal"> 

        </div> 
    </div>

    <div id="divBtn" class="text-2xl justify-center flex flex-row xl:-translate-y-8 xl:text-2xl">
        <button id="btnReservar" class="hidden py-2 mt-8 px-5 bg-blue-500 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-75" disabled>Reservar</button>  
        <button id="cancelaReserva" class="hidden py-2 mt-8 px-5 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-75" >Cancelar</button>  
    </div>
</div>

@endsection
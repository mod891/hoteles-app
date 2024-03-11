@extends('layouts.base2')

@section('title','Ficha de hotel')

@section('scripts')

<script src="{{ asset('/js/views/user/fichaHotel.js') }} " defer></script>
<style>
.marco-img { 
    padding:8px;
    background-color: #e0e0eb;
    border-radius: 0.7rem;
    height: 500px;
    width: 500px;
} 

@media only screen and (max-width: 810px) and (max-height: 1080px) {
    .marco-img {
        padding:2px;
        background-color: #e0e0eb;
        border-radius: 0.7rem;
        width:210px;
        height:210px;
    }
}
@media only screen and (max-width: 412px) and (max-height: 883px) {
    .marco-img {
        padding:2px;
        background-color: #e0e0eb;
        border-radius: 0.7rem;
        width:170px;
        height:170px;
    }
}
@media only screen and (max-width: 390px) and (max-height: 844px) {
    .marco-img {
        padding:2px;
        background-color: #e0e0eb;
        border-radius: 0.7rem;
        width:170px;
        height:170px;
    }
}

@media only screen and (max-width: 384px) and (max-height: 854px) {
    .marco-img {
        padding:2px;
        background-color: #e0e0eb;
        border-radius: 0.7rem;
        width:160px;
        height:160px;
    }
}

@media only screen and (max-width: 360px) and (max-height: 640px) {
    .marco-img {
        padding:2px;
        background-color: #e0e0eb;
        border-radius: 0.7rem;
        width:150px;
        height:150px;
    }
}
</style>
@endsection
@section('content')

<div id="main" class=" w-full rounded-lg" >
    <div class="flex flex-row justify-center xl:text-3xl text-xl xl:mt-8 xl:mb-8 mt-2 mb-2">
        Hotel {{ $hotel['nombre'] }}
    </div>
    <div id="reserva-fecha" class="hidden flex flex-row justify-center  ">
        
    </div>
    <div class="flex flex-row mr-4">

        <div class="flex flex-col w-1/2 p-4">
            <div class="marco-img shadow-2xl">
            <img  src="{{ $hotel['imagen'] }}" />
            </div>
            <div  class=" mt-8 mx-auto" >
                <img id="fav" class="unfilled" src="/images/icons/unfilled.png" title="añadir a favoritos"></img>
            </div>
        </div>
        
        <div class="flex flex-col w-1/2 mt-4 ">
            <div class="border border-black rounded-lg shadow-2xl pb-12  xl:pl-12 xl:pr-12">
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
                                <li class="ml-2">Habitacion {{ $hotel['habitaciones'][$i]['id'] }} - {{ $hotel['habitaciones'][$i]['precio'] }}€ </li>
                            @endfor
                            </ul>
                        </div>
                        
                        <select class="hidden" id="habitaciones">
                            <option value="">Seleccione una habitación</option>
                        </select>
                    
                </div>
            </div>
        </div>    
    </div>
    <div class="text-2xl justify-center flex flex-row xl:text-2xl">
        <div id="noFiltro" class="flex flex-row mt-8 " >
            <label class="xl:text-2xl flex text-xl ml-4 mr-4 xl:-translate-x-44">Seleccione una fecha para reservar habitación</label>
        </div>
        <div class="pb-8" id="precioTotal"> 

        </div> 
    </div>

    <div id="divBtn" class="text-2xl justify-center flex flex-row  xl:text-2xl">
        <button id="btnReservar" class="hidden py-2 mt-8 px-5 bg-blue-500 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-75" disabled>Reservar</button>  
        <button id="cancelaReserva" class="hidden py-2 mt-8 px-5 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-75" >Cancelar</button>  
    </div>
</div>

@endsection
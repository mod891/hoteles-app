
@props(['data'])
<style>
 .marco-img { 
        padding:8px;
        background-color: #e0e0eb;
        border-radius: 0.7rem;
        height: 400px;
        width: 400px;
       
    } 

@media only screen and (max-width: 360px) and (max-height: 640px) {
    .marco-img {
        padding:2px;
        background-color: #e0e0eb;
        border-radius: 0.7rem;
        width:250px;
        height:250px;
        
    }
}

</style>
<div style="background-color:var(--color6)" class="mt-8 shadow-2xl w-full rounded-lg" >

    <div class="flex flex-col xl:flex-row mt-4 mb-4">
        <div class="w-full xl:w-1/2 mt-4 my-4">

            <div class="marco-img flex mx-auto shadow-xl">
                 <img class="self-center" src="{{ $data['imagen'] }}" data-src="{{ $data['imagen'] }}" alt="" onClick="window.location = '{{ $data['url'] }}' "/>
            </div>
        </div>

        <div class="w-full xl:w-1/2">
            <div class="text-2xl xl:text-3xl mt-4 xl:mt-12">
                Hotel {{ $data['nombre'] }}
            </div>

            <div class="mt-4 xl:mt-16 xl:text-xl">
                <strong><label class="mr-4">{{ $data['text1'] }} el </label></strong>{{ $data['fechaIni'] }}
            </div>

            <div class="xl:text-xl" >
                <strong><label class="mr-4">Hasta el</label></strong>{{ $data['fechaFin'] }}  
            </div>
                
            <div class="text-2xl mt-6 xl:mt-16">
                <strong><label class="mr-4">Precio: </label></strong>{{ $data['precio'] }} €  
            </div>

            <div class="flex flex-row justify-around mt-8 pb-4 xl:mt-16">
                <a href="{{ $data['pdf'] }}" target="_blank" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="red" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z"/>
                    </svg>    
                </a>
                @if ($data['id'] != null) 
                <button id="btnCancelarReserva" class="py-2 px-5 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-75" onClick="rmReserva(this)" value="{{$data['id']}}">Cancelar</button>  
                @endif
            </div>
        </div>
    </div>
  
    
</div>

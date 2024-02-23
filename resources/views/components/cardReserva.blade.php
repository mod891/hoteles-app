
@props(['data'])
<style>
.marco-img { /* hacer media querys para height width */
   padding:8px;
   background-color: #ff0000;
   max-width: 250px;
   max-height: 250px;
   height: 250px;
   border: 1px solid #999999;
} 
</style>
<div style="background-color:var(--color6)" class="m-4 border-4 w-full rounded-lg" onClick="window.location = '{{ $data['url'] }}' ">
    <div class="flex flex-row justify-center text-xl pt-4">
        Hotel {{ $data['nombre'] }}
    </div>
    <div class="flex flex-row">

        <div class="flex flex-col w-1/2 p-4">
            <div class="marco-img flex">
                 <img class="self-center" src="{{ $data['imagen'] }}" data-src="{{ $data['imagen'] }}" alt=""/>
            </div>
        </div>

        <div class="flex flex-col w-1/2 mt-4 xl:mt-12">
         
            <div class="flex flex-col xl:flex-row xl:mt-8 xl:text-xl">
                <strong><label class="mr-4">{{ $data['text1'] }} el</label></strong>
                {{ $data['fechaIni'] }}   
                
            </div>
            <div class="flex flex-col xl:flex-row xl:mt-8 xl:text-xl">
            <strong><label class="mr-4">Hasta el</label></strong>
                {{ $data['fechaFin'] }}  
            </div>
            <div class="flex flex-row justify-end">
                
            </div>
        </div>    
    </div>
    <div class="text-2xl justify-center flex flex-row xl:-translate-y-8 xl:text-2xl">
        {{ $data['precio'] }} €  
    </div>
</div>

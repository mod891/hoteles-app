
@props(['data'])

<div style="background-color:var(--color6)" class="m-4 border-4 w-full rounded-lg" onClick="window.location = '{{ $data['url'] }}' ">
    <div class="flex flex-row justify-center text-xl pt-4">
        Habitación hotel {{ $data['nombre'] }}
    </div>
    <div class="flex flex-row">

        <div class="flex flex-col w-1/2 p-4">
            <img width="200px" src="{{ $data['imagen'] }}" />
            
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

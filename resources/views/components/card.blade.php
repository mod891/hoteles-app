@props(['data'])
<style>
 .marco-img { 
        padding:8px;
        background-color: #e0e0eb;
        border-radius: 0.7rem;
        height: 300px;
        width: 300px;
       
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
.rounded-lg {
    border-radius: 0.7rem !important;
}
</style>
<div style="background-color:var(--color2)" class="mt-8 mx-auto shadow-2xl w-full xl:w-10/12 rounded-lg" onClick="window.location = '{{ $data['url'] }}'">

    <div class="flex flex-col xl:flex-row mt-4 mb-4">
        <div class="w-full xl:w-1/2 mt-4 my-4">

            <div class="marco-img flex mx-auto shadow-xl">
                 <img class="self-center" src="{{ $data['imagen'] }}" data-src="{{ $data['imagen'] }}" alt="" />
            </div>
        </div>

        <div class="w-full xl:w-1/2">
            <div class="text-xl xl:text-3xl mt-4 xl:mt-6">
                Hotel {{ $data['nombre'] }}
            </div>

            <div class="mt-4 xl:mt-8 xl:text-xl">
            <strong><label class="mr-4">Municipio</label></strong>
                {{ $data['municipio'] }}  
            </div>

            <div class="xl:text-xl" >
                <strong><label class="mr-4">Provincia</label></strong>
                    {{ $data['provincia'] }}  
            </div>
             
            <div class="xl:text-xl mt-4 xl:mt-8 " >
                {{ $data['habitaciones'] }}  
            </div>
                
            <div class="text-2xl xl:text-3xl mt-4 mb-4 xl:mt-8">
                {{ $data['precio'] }}   
            </div>

            
        </div>
    </div>
</div>

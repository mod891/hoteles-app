
@extends('layouts.base2')

@section('title','inicio')

@section('scripts')
<script src="{{ asset('/js/views/user/inicio.js') }} " defer></script>
<style>
.filtro-img {
    width:16px;
    height:16px;
    float:left
}
</style>
@endsection

@section('content')

        
        <div id="filtros" class="flex flex-col lg:flex-row mx-auto mb-8">
            <div>
                <div>
                    <img id="camaMatrimonioFiltro" class="disabled mt-1 mr-8 lg:mr-2 filtro-img" src="/images/icons/check_no.png" title="filtro desabilitado"></img>
                    <div class="flex flex-row">
                        <input class="mr-2" id="camaMatrimonio" type="checkbox" disabled> 
                        <label class="lg:mr-6 text-gray-400" >Matrimonio</label>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <img id="balconFiltro" class="disabled mt-1 mr-8 lg:mr-2 filtro-img" src="/images/icons/check_no.png" title="filtro desabilitado"></img>
                    <div class="flex flex-row">
                        <input class="mr-2" id="balcon" type="checkbox" disabled> 
                        <label class="lg:mr-6 text-gray-400" >Balcon</label>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <img id="minibarFiltro" class="disabled mt-1 mr-8 lg:mr-2 filtro-img" src="/images/icons/check_no.png" title="filtro desabilitado"></img>
                    <div class="flex flex-row">
                        <input class="mr-2" id="minibar" type="checkbox" disabled> 
                        <label class="lg:mr-6 text-gray-400" >Minibar</label>
                    </div>
                </div>
            </div>
            
            <div>
                <div>
                    <img id="fumadoresFiltro" class="disabled mt-1 mr-8 lg:mr-2 filtro-img" src="/images/icons/check_no.png" title="filtro desabilitado"></img>
                    <div class="flex flex-row">
                        <input class="mr-2" id="fumadores" type="checkbox" disabled> 
                        <label class="lg:mr-6 text-gray-400" >Fumadores</label>
                    </div>
                </div>
            </div>
            
            <div>
                <div>
                    <img id="minicadenaWifiFiltro" class="disabled mt-1 mr-8 lg:mr-2 filtro-img" src="/images/icons/check_no.png" title="filtro desabilitado"></img>
                    <div class="flex flex-row">
                        <input class="mr-2" id="minicadenaWifi" type="checkbox" disabled> 
                        <label class="lg:mr-6 text-gray-400" >Minicadena wifi</label>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="w-10/12 mx-auto" id="cards-container">
        </div>

   

@endsection
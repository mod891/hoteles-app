
@extends('layouts.base2')

@section('title','inicio')

@section('scripts')
<script src="{{ asset('js/dist/jquery.min.js') }} " ></script>
<script src="{{ asset('js/dist/moment.min.js') }} " ></script>
<script type="text/javascript" src="{{ asset('/js/dist/daterangepicker.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('/js/dist/daterangepicker.css') }} " />
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


        <div id="provincia-fechas" class="flex flex-row  mx-auto mb-8">
            <select class="mr-4" id="provincia">
                <option value="">¿Dónde?</option>
            </select>
            <input type="text" class="bg-blue" placeholder="fecha entrada y salida" id="fecharg"/>
        </div>
        <div id="filtros" class="flex flex-col lg:flex-row mx-auto mb-8">
            <div>
                <div>
                    <div class="flex flex-row">
                        <input class="mr-2" id="camaMatrimonio" type="checkbox" > 
                        <label class="lg:mr-6 text-gray-400" >Matrimonio</label>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <div class="flex flex-row">
                        <input class="mr-2" id="balcon" type="checkbox" > 
                        <label class="lg:mr-6 text-gray-400" >Balcon</label>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <div class="flex flex-row">
                        <input class="mr-2" id="minibar" type="checkbox" > 
                        <label class="lg:mr-6 text-gray-400" >Minibar</label>
                    </div>
                </div>
            </div>
            
            <div>
                <div>
                    <div class="flex flex-row">
                        <input class="mr-2" id="fumadores" type="checkbox" > 
                        <label class="lg:mr-6 text-gray-400" >Fumadores</label>
                    </div>
                </div>
            </div>
            
            <div>
                <div>
                    <div class="flex flex-row">
                        <input class="mr-2" id="minicadenaWifi" type="checkbox" > 
                        <label class="lg:mr-6 text-gray-400" >Minicadena wifi</label>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="w-10/12 mx-auto" id="cards-container">
        </div>

   

@endsection
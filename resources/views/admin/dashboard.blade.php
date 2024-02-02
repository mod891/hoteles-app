@extends('layouts.base')

@section('title','panel de administración')
@section('scripts')
<script src="{{ asset('/js/api/main.js') }} "></script>
<script src="{{ asset('/js/views/admin/dashboard.js') }} "></script>
@endsection
@section('content')
    @auth
        <a href="{{ route('logout') }}" >Log out</a>
    @endauth

        <div class="flex">
            <div class="flex-col">
                <div class="tab">
                    <a href="#" id="hoteles">Hoteles</a>
                </div>
                <div class="tab">
                    <a href="#" id="usuarios">Usuarios</a>
                </div>
                <!-- -->
                <div id="crudHotel">
                    @include('hotel.table')
                </div>
                <div id="crearHotelView" class="">
                    @include('hotel.crearHotel')
                </div>
                <div id="crearUsuarioView" class="">
                    @include('usuario.crearUsuario')
                </div>
            </div>
        </div>
        Admin view
@endsection
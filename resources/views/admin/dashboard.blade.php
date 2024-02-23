@extends('layouts.base2')

@section('title','panel de administración')
@section('scripts')
<script src="{{ asset('/js/api/main.js') }} "></script>
<script src="{{ asset('/js/views/admin/dashboard.js') }} " defer></script>
<script src="{{ asset('/js/views/admin/tableUsers.js') }} " defer></script>
<script src="{{ asset('/js/views/admin/tableHotels.js') }} " defer></script>
@endsection
@section('content')
    <div id="admin-view" class="w-10/12 mx-auto">

    

        <div class="flex flex-row justify-center">
            <div class="tab mx-12">
                <a href="#" id="hoteles">Hoteles</a>
            </div>
            <div class="tab mx-12">
                <a href="#" id="usuarios">Usuarios</a>
            </div>
        </div>

        <div class="" id="crudHotel">
                @include('admin.hotel.table')
        </div>
          
        <div class="hidden" id="crudUsuario">
                @include('admin.usuario.table')
        </div>
    </div>
@endsection
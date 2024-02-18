@extends('layouts.base2')

@section('title','Mis habitaciones favoritas')

@section('scripts')
<script src="{{ asset('/js/views/user/favoritos.js') }} " defer></script>
@endsection

@section('content')
        <div class="mx-auto text-2xl">
                <h1>Hoteles favoritos</h1>
        </div>
        <div class="w-10/12 mx-auto" id="card-favoritos-container">
        </div>

@endsection

@extends('layouts.base2')

@section('title','Mis hoteles visitados')

@section('scripts')
<script src="{{ asset('/js/views/user/visitados.js') }} " defer></script>
@endsection

@section('content')
        <div class="mx-auto text-2xl">
                <h1>Hoteles visitados</h1>
        </div>
        <div class="w-10/12 mx-auto" id="card-visitados-container">
        </div>

@endsection
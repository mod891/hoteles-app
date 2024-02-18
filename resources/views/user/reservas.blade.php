
@extends('layouts.base2')

@section('title','Mis reservas')

@section('scripts')
<script src="{{ asset('/js/views/user/reservas.js') }} " defer></script>
@endsection

@section('content')
        <div class="mx-auto text-2xl">
                <h1>Mis reservas</h1>
        </div>
        <div class="w-10/12 mx-auto" id="card-reservas-container">
        </div>

@endsection
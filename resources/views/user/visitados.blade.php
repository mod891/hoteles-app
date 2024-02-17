
@extends('layouts.base2')

@section('title','Mis hoteles visitados')

@section('scripts')
<script src="{{ asset('/js/views/user/visitados.js') }} " defer></script>
@endsection

@section('content')

        <div class="w-10/12 mx-auto" id="card-visitados-container">
        </div>

@endsection
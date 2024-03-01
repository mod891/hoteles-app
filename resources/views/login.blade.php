@extends('layouts.base')
@section('title','Registro')

@section('scripts')
@endsection
@section('content') 
<div id="login-form" class="max-w-md flex flex-col mx-auto bg-white p-6 rounded-md shadow-2xl">
    <h2 class="text-2xl font-semibold mb-4 mx-auto">Inicia sesión</h2>

        <form method="POST" action="{{ route('authenticate') }}">
            @csrf
            <!-- Usuario -->
            <div class="mb-4 ml-12 xl:ml-20">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}">
                <div class="input-message-error" id="nombreError"></div>
            </div>
            <!-- Contraseña -->
            <div class="mb-4 ml-12 xl:ml-20">
                <label for="apellidos" class="block text-gray-700 font-semibold">Contraseña</label>
                <input id="password" name="password" type="password">
                <div class="input-message-error" id="nombreError"></div>
            </div>

            <div class="mt-8 text-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                Login
                </button>
            </div>
        </form>
 
@endsection

        
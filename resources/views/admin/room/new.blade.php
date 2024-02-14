@extends('layouts.base')
@section('title','Crear habitacion')
@section('scripts')
<script src="{{ asset('/js/views/formRoom.js') }} " defer></script>
@endsection
@section('content')
 
<div id="crear-habitacion-view" class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Nueva Habitacion</h2>
    
    @session('popup')
    <div class="p-4 bg-green-100">
      <script>
        popup('{{$value;}}');
      </script>
    </div>
    @endsession
    <form id="crear-habitacion-form" action="/api/room" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="idHotel" id="idHotel" value=""/>
      <!-- Fumadores -->
      <div class="mb-4">
        <div class="flex flex-row">

          <label for="fumadores" class="w-1/2 block text-gray-700 font-semibold">Fumadores</label>
            Si
            <input type="radio" id="si" name="fumadores" value="1" class="w-1/4 border rounded-md  focus:border-blue-500">
            No
            <input type="radio" id="no" name="fumadores" value="0" class="w-1/4  border rounded-md focus:border-blue-500">
        </div>
      </div>
      <!-- Minibar -->
      <div class="mb-4">
        <div class="flex flex-row">
          <label for="minibar" class="w-1/2 block text-gray-700 font-semibold">Minibar</label>
            Si
            <input type="radio" id="si" name="minibar" value="1" class="w-1/4 border rounded-md  focus:border-blue-500">
            No
            <input type="radio" id="no" name="minibar" value="0" class="w-1/4  border rounded-md focus:border-blue-500">
        </div>
      </div>

      <!-- Minicadena wifi -->
      <div class="mb-4">
        <div class="flex flex-row">
          <label for="minibar" class="w-1/2 block text-gray-700 font-semibold">Minicadena Wifi</label>
            Si
            <input type="radio" id="si" name="minicadenaWifi" value="1" class="w-1/4 border rounded-md  focus:border-blue-500">
            No
            <input type="radio" id="no" name="minicadenaWifi" value="0" class="w-1/4  border rounded-md focus:border-blue-500">
        </div>
      </div>

      <!-- Balcon -->
      <div class="mb-4">
        <div class="flex flex-row">
          <label for="balcon" class="w-1/2 block text-gray-700 font-semibold">Balcon</label>
            Si
            <input type="radio" id="si" name="balcon" value="1" class="w-1/4 border rounded-md  focus:border-blue-500">
            No
            <input type="radio" id="no" name="balcon" value="0" class="w-1/4  border rounded-md focus:border-blue-500">
        </div>
      </div>
      <!-- Cama matrimonio -->
      <div class="mb-4">
        <div class="flex flex-row">
          <label for="camaMatrimonio" class="w-1/2 block text-gray-700 font-semibold">Cama matrimonio</label>
            Si
            <input type="radio" id="si" name="camaMatrimonio" value="1" class="w-1/4 border rounded-md  focus:border-blue-500">
            No
            <input type="radio" id="no" name="camaMatrimonio" value="0" class="w-1/4  border rounded-md focus:border-blue-500">
        </div>
      </div>

      
      <!-- Descripcion -->
      <div class="mb-4">
        <div class="flex flex-col">
          <label for="descripcion" class="w-1/2 block text-gray-700 font-semibold">Descripcion</label>
           <textarea cols="60" rows="4" id="descripcion" name="descripcion" value="" class="w-full border rounded-md  focus:border-blue-500"></textarea>
        </div>
      </div>

     

      <!-- Imagen -->
      <div class="mb-4">
        <div class="flex flex-row">
          <label for="imagen" class="w-1/2 block text-gray-700 font-semibold">Foto</label>
          <input type="file" id="imagen" name="imagen" class="w-full py-2 focus:outline-none">
          <div class="input-message-error" id="imagenError"></div>
        </div>
      </div>

      <!-- Precio -->
      <div class="mb-4">
        <div class="flex flex-row">
          <label for="precio" class="w-1/2 block text-gray-700 font-semibold">Precio</label>
           <input type="number" min="0" id="precio" name="precio" value="" class="w-1/4 mx-6 border rounded-md  focus:border-blue-500">€
        </div>
      </div>
      <!-- Botón de Crear -->
      <div class="text-center">
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
          Crear
        </button>
      </div>
    </form>

  </div>
@endsection
 


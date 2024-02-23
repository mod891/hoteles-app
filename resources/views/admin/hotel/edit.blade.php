@extends('layouts.base')
@section('title','Editar hotel')
@section('scripts')
<script src="{{ asset('/js/views/formHotel.js') }} " defer></script>
@endsection
@section('content')
<div id="edit-hotel-view" class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Editar Hotel</h2>

    <form id="edit-hotel-form" action="/api/hotel" method="POST" enctype="multipart/form-data">
      <input type="hidden" id="id" value="{{ $hotel['id'] }}"/>
      <!-- Nombre -->
      <div class="mb-4">
        <label for="nombre" class="block text-gray-700 font-semibold">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{ $hotel['nombre'] }}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        <div class="input-message-error" id="nombreError"></div>
      </div>
      <!-- Dirección -->
      <div class="mb-4">
        <label for="direccion" class="block text-gray-700 font-semibold">Dirección</label>
        <input type="text" id="direccion" name="direccion" value="{{ $hotel['direccion'] }}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        <div class="input-message-error" id="direccionError"></div>
      </div>
      <!-- Provincia -->
      <div class="mb-4">
        <label for="provincia" class="block text-gray-700 font-semibold">Provincia</label>
        <select id="provincia" name="provincia" selected="{{ $hotel['provincia'] }}" class="oldval-{{ $hotel['provincia'] }} w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
          <option value="">Seleccione provincia</option>
        </select>
        <div class="input-message-error" id="provinciaError"></div>
      </div>
      <!-- Municipio -->
      <div class="mb-4">
        <label for="municipio" class="block text-gray-700 font-semibold">Municipio</label>
        <input type="text" id="municipio" name="municipio" value="{{ $hotel['municipio'] }}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        <div class="input-message-error" id="municipioError"></div>
      </div>
      <!-- Teléfono -->
      <div class="mb-4">
        <label for="telefono" class="block text-gray-700 font-semibold">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" value="{{ $hotel['telefono'] }}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        <div class="input-message-error" id="telefonoError"></div>
      </div>

      <!-- Imagen -->
      <div class="mb-4">
        <label for="imagen" class="block text-gray-700 font-semibold">Imagen</label>
        <div class="">
          <input type="text" id="oldImagen" name="oldImagen" placeholder="{{ explode('/',$hotel['imagen'])[4] }}" value="{{ $hotel['imagen'] }}" class="w-4/5 px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" disabled>
          <img id="rmOldimagen" style="float:right" class="disabled mt-1 lg:mr-2 filtro-img" src="/images/icons/check_no.png" title="borrar imagen"></img>
        </div>
        <input type="file" id="imagen" name="imagen" class="hidden w-full py-2 focus:outline-none">
        <div class="input-message-error" id="imagenError"></div>
      </div>

      <!-- Botón de modificar -->
      <div class="text-center">
        <button id="btnModificar" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
          Modificar
        </button>
      </div>
    </form>
  </div>
@endsection

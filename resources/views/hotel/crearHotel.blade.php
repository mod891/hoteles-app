<!--div class="h-screen flex items-center justify-center"> -->
 
<div id="crear-hotel-view" class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Nuevo Hotel</h2>

    <form id="crear-hotel-form" action="/api/hotel" method="POST" enctype="multipart/form-data">
      <!-- Nombre -->
      <div class="mb-4">
        <label for="nombre" class="block text-gray-700 font-semibold">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        <div class="input-message-error" id="nombreError"></div>
      </div>
      <!-- Dirección -->
      <div class="mb-4">
        <label for="direccion" class="block text-gray-700 font-semibold">Dirección</label>
        <input type="text" id="direccion" name="direccion" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        <div class="input-message-error" id="direccionError"></div>
      </div>
      <!-- Provincia -->
      <div class="mb-4">
        <label for="provincia" class="block text-gray-700 font-semibold">Provincia</label>
        <input type="text" id="provincia" name="provincia" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        <div class="input-message-error" id="provinciaError"></div>
      </div>
      <!-- Municipio -->
      <div class="mb-4">
        <label for="municipio" class="block text-gray-700 font-semibold">Municipio</label>
        <input type="text" id="municipio" name="municipio" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        <div class="input-message-error" id="municipioError"></div>
      </div>
      <!-- Teléfono -->
      <div class="mb-4">
        <label for="telefono" class="block text-gray-700 font-semibold">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        <div class="input-message-error" id="telefonoError"></div>
      </div>

      <!-- Imagen -->
      <div class="mb-4">
        <label for="imagen" class="block text-gray-700 font-semibold">Imagen</label>
        <input type="file" id="imagen" name="imagen" class="w-full py-2 focus:outline-none">
        <div class="input-message-error" id="imagenError"></div>
      </div>

      <!-- Botón de Crear -->
      <div class="text-center">
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
          Crear
        </button>
      </div>
    </form>
  </div>
 
<script src="{{ asset('/js/views/crearHotel.js') }} "></script>


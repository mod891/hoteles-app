  
<div id="crear-usuario-view" class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Nuevo Usuario</h2>
  
    <form action="{{}}" method="POST">
      <!-- Nombre -->
      <div class="mb-4">
        <label for="nombre" class="block text-gray-700 font-semibold">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
      </div>
      <!-- apellidos -->
      <div class="mb-4">
        <label for="apellidos" class="block text-gray-700 font-semibold">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
      </div>

      <!-- email -->
      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-semibold">Email</label>
        <input type="text" id="email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
      </div>
      <!-- Contraseña -->
      <div class="mb-4">
        <label for="password" class="block text-gray-700 font-semibold">Constraseña</label>
        <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
      </div>
      <!-- Contraseña -->
      <div class="mb-4">
        <label for="passwordRepeat" class="block text-gray-700 font-semibold">Repita la constraseña</label>
        <input type="password" id="passwordRepeat" name="passwordRepeat" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
      </div>
      <!-- Teléfono -->
      <div class="mb-4">
        <label for="telefono" class="block text-gray-700 font-semibold">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
      </div>

      <!-- falta DNI en seeder, modelo, vista + alg JS/php validaDNI -->

      <!-- Botón de Crear -->
      <div class="text-center">
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
          Crear
        </button>
      </div>
    </form>
  </div>

var nombre = document.getElementById('nombre')
var direccion = document.getElementById('direccion')
var provincia = document.getElementById('provincia')
var muncipio = document.getElementById('muncipio')
var telefono = document.getElementById('telefono')
var imagen = document.getElementById('imagen')
var form = document.getElementById('crear-hotel-form');

form.addEventListener('submit',validar)

clear() 

function clear() {
    imagen.value = null;
}
function validar(evt) {
    evt.preventDefault();
    var hayErrores = false;
    var errors = [];
    var regexp1 = /^[^0-9]+$/; //cadena no vacía y sin números
    var regexpTlfn = / /; // TODO [1]
    if ( !regexp1.test(nombre.value) ) {
        hayErrores = true;
        if (!nombre.classList.contains('input-error')) {
            nombre.classList.add('input-error')  
            document.getElementById('nombreError').innerText = 'El nombre no es válido' 
        }
    } 
    else if (nombre.classList.contains('input-error')) {
        nombre.classList.remove('input-error') 
        document.getElementById('nombreError').innerText = ''; 
    }
        
    if (direccion.value.length == 0) {
        hayErrores = true;
        if (!direccion.classList.contains('input-error')) {
            direccion.classList.add('input-error')  
            document.getElementById('direccionError').innerText = 'La direccion no es válida' 
        }
    }
    else if (direccion.classList.contains('input-error')) {
        direccion.classList.remove('input-error') 
        document.getElementById('direccionError').innerText = ''; 
    }

    if (provincia.value.length == 0) {
        hayErrores = true;
        if (!provincia.classList.contains('input-error')) {
            provincia.classList.add('input-error')  
            document.getElementById('provinciaError').innerText = 'La provincia no es válida' 
        }
    }
    else if (provincia.classList.contains('input-error')) {
        provincia.classList.remove('input-error') 
        document.getElementById('provinciaError').innerText = ''; 
    }

    if (municipio.value.length == 0) {
        hayErrores = true;
        if (!municipio.classList.contains('input-error')) {
            municipio.classList.add('input-error')  
            document.getElementById('municipioError').innerText = 'El municipio no es válido' 
        }
    }
    else if (municipio.classList.contains('input-error')) {
        municipio.classList.remove('input-error') 
        document.getElementById('municipioError').innerText = ''; 
    }

    if (telefono.value.length == 0) {// [1]
        hayErrores = true;
        if (!telefono.classList.contains('input-error')) {
            telefono.classList.add('input-error')  
            document.getElementById('telefonoError').innerText = 'El telefono no es válido' 
        }
    }
    else if (telefono.classList.contains('input-error')) {
        telefono.classList.remove('input-error') 
        document.getElementById('telefonoError').innerText = ''; 
    }

    if (imagen.value == null || imagen.value == "" ) {
        hayErrores = true;
        if (!imagen.classList.contains('input-error')) {
            imagen.classList.add('input-error')  
            document.getElementById('imagenError').innerText = 'Debe seleccionar una imagen' 
        }
    }
    else if (imagen.classList.contains('input-error')) {
        imagen.classList.remove('input-error') 
        document.getElementById('imagenError').innerText = ''; 
    }

    if (!hayErrores) 
        this.submit()
    else {

        return
    }
}
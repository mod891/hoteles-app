var nombre = document.getElementById('nombre')
var direccion = document.getElementById('direccion')
var provincia = document.getElementById('provincia')
var municipio = document.getElementById('municipio')
var telefono = document.getElementById('telefono')
var imagen = document.getElementById('imagen')
var formCreate = document.getElementById('crear-hotel-form');
var btnModificar = document.getElementById('btnModificar');
var rmOldImagen =  document.getElementById('rmOldimagen');
var oldImg = document.getElementById('oldImagen')
//var selectProvincia = document.getElementById('')
/* 
la misma función de validar para el formulario de crear y modificar, el de crear manda el formulario con submit de form,
el de modificar los datos se mandan con put de axios al activarse el evento click del botón modificar
*/
if (formCreate != null)
    formCreate.addEventListener('submit',validar)

if (btnModificar != null)
    btnModificar.addEventListener('click',validar)
if (rmOldImagen != null) 
    rmOldImagen.addEventListener('click',rmOldImg)

clear() 
loadProvincias();

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

    if (provincia.value == "") {
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
 // cuando cargue img url se volverá a activar
    if (oldImg != null && oldImg.value == "" ) {// editForm: borrada antigua imagen
        if (imagen.value == null || imagen.value == "" ) {
            hayErrores = true;
            if (!imagen.classList.contains('input-error')) {
                imagen.classList.add('input-error')  
                document.getElementById('imagenError').innerText = 'Debe seleccionar una imagen' 
            }
        }
    } else if (oldImg == null) { // newForm
        if (imagen.value == null || imagen.value == "" ) {
            hayErrores = true;
            if (!imagen.classList.contains('input-error')) {
                imagen.classList.add('input-error')  
                document.getElementById('imagenError').innerText = 'Debe seleccionar una imagen' 
            }
        }
    }
    else if (imagen.classList.contains('input-error')) {
        imagen.classList.remove('input-error') 
        document.getElementById('imagenError').innerText = ''; 
    }
/**/

    if (!hayErrores) {
        if (this.id == 'crear-hotel-form')
            this.submit()

        else if (this.id == 'btnModificar') {
            let id = document.getElementById('id').value
            let imagenSrc = oldImg.value != ""? oldImg.value : imagen.value
            const data = {
                id: id,
                nombre: nombre.value,
                direccion: direccion.value,
                provincia: provincia.value,
                municipio: municipio.value,
                telefono: telefono.value,
                imagen: imagenSrc
            }
            axios.put('../../api/hotel/'+id,data).then(r => {
                if (r.data.success)
                    window.location = '/'
                
            }).catch(error => {
                console.log(error)
            })
        }
    }
    else {
        return
    }
}

function rmOldImg(e) {
    e.target.previousElementSibling.value=""
    e.target.parentNode.classList.add('hidden')
    e.target.parentNode.nextElementSibling.classList.remove('hidden')
} 
function loadProvincias() {

    var listProvincias = [
        'Albacete',
        'Alicante/Alacant',
        'Almería',
        'Araba/Álava',
        'Asturias',
        'Ávila',
        'Badajoz',
        'Balears, Illes',
        'Barcelona',
        'Bizkaia',
        'Burgos',
        'Cáceres',
        'Cádiz',
        'Cantabria',
        'Castellón/Castelló',
        'Ciudad Real',
        'Córdoba',
        'Coruña', 
        'Cuenca',
        'Gipuzkoa',
        'Girona',
        'Granada',
        'Guadalajara',
        'Huelva',
        'Huesca',
        'Jaén',
        'León',
        'Lleida',
        'Lugo',
        'Madrid',
        'Málaga',
        'Murcia',
        'Navarra',
        'Ourense',
        'Palencia',
        'Las Palmas', 
        'Pontevedra',
        'La Rioja',
        'Salamanca',
        'Santa Cruz de Tenerife',
        'Segovia',
        'Sevilla',
        'Soria',
        'Tarragona',
        'Teruel',
        'Toledo',
        'Valencia/València',
        'Valladolid',
        'Zamora',
        'Zaragoza',
        'Ceuta',
        'Melilla',
    ]

   
    let str = provincia.classList.toString()
    let ind = str.search('oldval-')
    let oldVal = null;
    if ( ind != -1) {
        let tam = str.indexOf(' ',ind);
        let substr = str.substring(0,tam)
        oldVal = substr.split('-')[1]
    }
    for (let i=0; i<listProvincias.length; i++) {
        let option = document.createElement('option')
        option.text = listProvincias[i];
        option.value = listProvincias[i];
        if (oldVal != null) 
            if (listProvincias[i] == oldVal)
                option.selected = true;
        provincia.add(option);
    }
}

var nombre = document.getElementById('nombre')
var apellidos = document.getElementById('apellidos')
var email = document.getElementById('email')
var password = document.getElementById('password')
var passwordRepeat = document.getElementById('passwordRepeat')
var telefono = document.getElementById('telefono')
var formCreate = document.getElementById('crear-usuario-form');
var btnModificar = document.getElementById('btnModificar');

if (btnModificar == null)
    setTimeout(clear, 50);
/* 
la misma función de validar para el formulario de crear y modificar, el de crear manda el formulario con submit de form,
el de modificar los datos se mandan con put de axios al activarse el evento click del botón modificar
*/
if (formCreate != null)
    formCreate.addEventListener('submit',validar)

if (btnModificar != null)
    btnModificar.addEventListener('click',validar)

function clear() {
    email.value = "";
    password.value = "";
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
        
    if (apellidos.value.length == 0) {
        hayErrores = true;
        if (!apellidos.classList.contains('input-error')) {
            apellidos.classList.add('input-error')  
            document.getElementById('apellidosError').innerText = 'Los apellidos no son válidos' 
        }
    }
    else if (apellidos.classList.contains('input-error')) {
        apellidos.classList.remove('input-error') 
        document.getElementById('apellidosError').innerText = ''; 
    }

    if (email.value.length == 0) { // TODO: regexp
        hayErrores = true;
        if (!email.classList.contains('input-error')) {
            email.classList.add('input-error')  
            document.getElementById('emailError').innerText = 'El email no es válido' 
        }
    }
    else if (email.classList.contains('input-error')) {
        email.classList.remove('input-error') 
        document.getElementById('emailError').innerText = ''; 
    }

    if (formCreate != null) {
        if (password.value.length == 0) {
            hayErrores = true;
            if (!password.classList.contains('input-error')) {
                console.log('err pass')

                password.classList.add('input-error')  
                document.getElementById('passwordError').innerText = 'La contraseña no es válida' 
            }
        }
        else if (password.classList.contains('input-error')) {
            password.classList.remove('input-error') 
            document.getElementById('passwordError').innerText = ''; 
        }
    }

    if (formCreate != null) {
        if (passwordRepeat.value.length == 0) {
            hayErrores = true;
            if (!passwordRepeat.classList.contains('input-error')) {
                passwordRepeat.classList.add('input-error')  
                document.getElementById('passwordRepeatError').innerText = 'La contraseña no es válida' 
            }
        }
        else if (passwordRepeat.classList.contains('input-error')) {
            passwordRepeat.classList.remove('input-error') 
            document.getElementById('passwordRepeatError').innerText = ''; 
        }
    }
    // comprobación de que las contraseñas son iguales 
    if ( (password.value != passwordRepeat.value)  ) { // && (password.value.length != passwordRepeat.value.length)
        hayErrores = true;
        if (!password.classList.contains('input-error')) {
            password.classList.add('input-error')  
            document.getElementById('passwordError').innerText = '' 
        }
        if (!passwordRepeat.classList.contains('input-error')) {
            passwordRepeat.classList.add('input-error')  
            document.getElementById('passwordRepeatError').innerText = 'Las contraseñas no coinciden' 
        }
    }
/*
    else if (passwordRepeat.classList.contains('input-error') || password.classList.contains('input-error')) {
        password.classList.remove('input-error') 
        passwordRepeat.classList.remove('input-error') 
        document.getElementById('passwordError').innerText = ''; 
        document.getElementById('passwordRepeatError').innerText = ''; 
    }
*/
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

    if (!hayErrores) {
        if (this.id == 'crear-usuario-form')
            this.submit()

        else if (this.id == 'btnModificar') {
            let id = document.getElementById('id').value
            const data = {
                id: id,
                nombre: nombre.value,
                apellidos: apellidos.value,
                email: email.value,
                password: password.value,
                passwordRepeat: passwordRepeat.value,
                telefono: telefono.value,
            }
            axios.put('../../api/user/'+id,data).then(r => {
                if (r.data.success)
                   window.location = '/'
                 //  console.log('modificado')// 
                
            }).catch(error => {
                console.log(error)
            })
        }
    }
    else {
        return
    }
}


var tabHotel = document.getElementById('hoteles')
var tabUsuario = document.getElementById('usuarios')
var crudHotel = document.getElementById('crudHotel');
var crudUsuario = document.getElementById('crudUsuario');

tabHotel.addEventListener('click',toogleTabContent);
tabUsuario.addEventListener('click',toogleTabContent);

function toogleTabContent() {
    
    if (this.id == 'hoteles') {
        if (crudHotel.classList.contains('hidden'))
            crudHotel.classList.remove('hidden')
        
        if (!crudUsuario.classList.contains('hidden'))
            crudUsuario.classList.add('hidden')
    }
    else if (this.id == 'usuarios') {
        if (crudUsuario.classList.contains('hidden'))
            crudUsuario.classList.remove('hidden')
        
        if (!crudHotel.classList.contains('hidden'))
            crudHotel.classList.add('hidden')       
    }

}
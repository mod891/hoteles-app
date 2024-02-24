var btnReserva = document.getElementById('btnReservar');
var confirmarReserva = document.getElementById('confirmaReserva');
var cancelaReserva = document.getElementById('cancelaReserva');
var hotel = location.pathname.split('/')[2]
var fav = document.getElementById('fav')
var obj = null;
var selectRoom = document.getElementById('habitaciones')
var divFechaReserva = document.getElementById('reserva-fecha')
var divTotal = document.getElementById('precioTotal')
var divListHabitaciones = document.getElementById('habitacionesDelHotel')
var datos = { roomId: 0, dias:0, fechaIni:'', fechaFin:'', precio:0 }
var fechasReservas = [];

selectRoom.addEventListener('change',showTotal);
btnReserva.addEventListener('click',crearReserva);
cancelaReserva.addEventListener('click',cancelarReserva);
fav.addEventListener('click',addRemoveFav);

init();


function init() {

    loadFav();
// caso 1 -> viene de buscar una reserva x dias
//  btn reserva disabled hasta seleccionar habitacion
// caso 2 -> pincha en el enlace sin buscar fecha
// btn reserva hidden

    if (location.search.length != 0) {
        btnReserva.classList.remove('hidden')
        obj = JSON.parse(atob(location.search.substring(3)))
        var textFechas = `<p>Reserva del ${obj.fechas.fechaIni} al ${obj.fechas.fechaFin}</p>` 
        divFechaReserva.classList.remove('hidden')
        divFechaReserva.innerHTML = textFechas
        divListHabitaciones.classList.add('hidden')
        selectRoom.classList.remove('hidden')
        for (let i=0; i<obj.rooms.length; i++) {
            let option = document.createElement('option')
            option.text = 'Habitacion '+obj.rooms[i].id+' - '+obj.rooms[i].precio+'€ la noche'
            option.value = i
            selectRoom.add(option)
        }
    }       
}

function showTotal(e) {
    console.log(e)
    if (e.target.value != '') {

        datos.roomId = obj.rooms[e.target.value].id
        datos.precio = obj.fechas.dias*obj.rooms[e.target.value].precio
        datos.fechaIni = obj.fechas.fechaIni
        datos.fechaFin = obj.fechas.fechaFin
        datos.dias = obj.fechas.dias

        btnReserva.classList.add('hover:bg-blue-700')
        btnReserva.disabled = false
        
        divTotal.innerHTML = `${obj.fechas.dias} noches x ${obj.rooms[e.target.value].precio } €/noche = ${datos.precio}€ `
        divTotal.classList.remove('hidden')
    } else {
        divTotal.classList.add('hidden')
        btnReserva.classList.remove('hover:bg-blue-700')
        btnReserva.disabled = true

    }
   //  
      //  mostrarTotal(datos.dias,precio);   
}

function cancelarReserva() {
    location = '/'
}

function crearReserva() {
    console.log('crea')
    axios.post('../../api/reserva', datos ).then(r => {
        Swal.fire({
            title: "Reserva creada",
            text: 'Se ha creado una nueva reserva',
            icon: "success",
            showCloseButton: false,
            showCancelButton: false,
            confirmButtonText: 'Ok',
        })
        .then((result) => {
            if (result.isConfirmed) {
                window.location = '/';
            }
        })
    }) 
}

function loadFav() {
    axios.get('../../api/favorito?hotel='+hotel).then(r => {
        if (r.data.favorito == 1) {
            fav.src = '/images/icons/filled.png'
            fav.classList.remove("unfilled")
            fav.classList.add("filled")
        } else if (r.data.favorito == 0) {
            fav.src = '/images/icons/unfilled.png'
            fav.classList.remove("filled")
            fav.classList.add("unfilled")
        }      
    })
}

function addRemoveFav(e) {

    if (e.target.classList.contains("unfilled")) {
        e.target.src = '/images/icons/filled.png'
        e.target.classList.remove("unfilled")
        e.target.classList.add("filled")
        
    } else if (e.target.classList.contains("filled")) {
        e.target.src = '/images/icons/unfilled.png'
        e.target.classList.remove("filled")
        e.target.classList.add("unfilled")
    }
         
    axios.post('../../api/toogleFavorito',{hotel})
}

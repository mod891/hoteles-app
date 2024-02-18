var btnReserva = document.getElementById('startReserva');
var confirmarReserva = document.getElementById('confirmaReserva');
var cancelaReserva = document.getElementById('cancelaReserva');
var divInicial = document.getElementById('main');
var divReservando = document.getElementById('reservando');
var room = location.pathname.split('/')[2]
var fav = document.getElementById('fav')
var precio = Number.parseInt(document.getElementById('precio').innerHTML);
var datos = { roomId: 0, dias:0, fechaIni:'', fechaFin:'', precio:0 }
var fechasReservas = [];

btnReserva.addEventListener('click',startReserva);
confirmarReserva.addEventListener('click',crearReserva);
cancelaReserva.addEventListener('click',cancelarReserva);
fav.addEventListener('click',addRemoveFav);

loadFav();
diasReservados();

// intercambiar dos divs con innerHtml rompe las referencias de los eventos
function startReserva() {
    
    divInicial.classList.add('hidden')
    divReservando.classList.remove('hidden')
 
   // $('#dtRange').daterangepicker({}); jqueryUI no responsive
    
    $('#dtRange').daterangepicker({
        opens: 'center',
        isInvalidDate: function(date) {
            if (fechasReservas.includes(date.format('YYYY-MM-DD')) )
                return true;
        },
      }, function(start, end, label) { // apply btn
        datos.roomId = window.location.pathname.split('/')[2]
        datos.dias = end.diff(start,'days')+1;
        datos.fechaIni = start.format('YYYY-MM-DD')
        datos.fechaFin = end.format('YYYY-MM-DD')
        datos.precio = datos.dias*precio
        console.log(end.diff(start,'days')+1,' dias de estancia');
        mostrarTotal(datos.dias,precio);
    });

}

function cancelarReserva() {
    location.reload()
}

// un texto descriptivo de lo que le cuesta la estancia
function mostrarTotal(dias,precio) {
    var btn = document.getElementById('confirmaReserva');
    var texto = document.getElementById('diasPrecio');
    texto.innerHTML = dias+" dias x "+precio+" € = "+dias*precio+" €";
    if (btn.classList.contains('hidden'))
        btn.classList.remove('hidden') 
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
    axios.get('../../api/favorito?room='+room).then(r => {
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
         
    axios.post('../../api/toogleFavorito',{room})
}

function diasReservados() {
    axios.get('../../api/reserva/dias?room='+room).then(r => {
        console.log(r)
        fechasReservas = r.data
    })
}
/*
function textToElement(html) {
    var div = document.createElement('div')
    div.innerHTML = html.trim()
    return div.firstChild
}
*/
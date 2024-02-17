var btnReserva = document.getElementById('startReserva');
var confirmarReserva = document.getElementById('confirmaReserva');
var cancelaReserva = document.getElementById('cancelaReserva');
var divInicial = document.getElementById('main');
var divReservando = document.getElementById('reservando');
var room = location.pathname.split('/')[2]
var fav = document.getElementById('fav')
var precio = Number.parseInt(document.getElementById('precio').innerHTML);
var datos = { roomId: 0, dias:0, fechaIni:'', fechaFin:'', precio:0 }

/* problemas remplazar svg, usar iconos .img */
//var filled = `<svg id="filled" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/></svg>`
//var unfilled =  `<svg id="unfilled" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="black" class="bi bi-heart" viewBox="0 0 16 16"><path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/></svg>`

btnReserva.addEventListener('click',startReserva);
confirmarReserva.addEventListener('click',crearReserva);
cancelaReserva.addEventListener('click',cancelarReserva);
fav.addEventListener('click',addRemoveFav);

loadFav();


// intercambiar dos divs con innerHtml rompe las referencias de los eventos
function startReserva() {
    
    divInicial.classList.add('invisible')
    divReservando.classList.remove('invisible')
 
    $('#dtRange').daterangepicker({
        opens: 'center'
      }, function(start, end, label) { // apply btn
        datos.roomId = window.location.pathname.split('/')[2]
        datos.dias = end.diff(start,'days');
        datos.fechaIni = start.format('YYYY-MM-DD')
        datos.fechaFin = end.format('YYYY-MM-DD')
        datos.precio = datos.dias*precio
        console.log(end.diff(start,'days'),' dias de estancia');
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
    if (btn.classList.contains('invisible'))
        btn.classList.remove('invisible') 
}

function crearReserva() {
    console.log('crea')
    axios.post('../../api/reserva', datos ).then(r => {
        //console.log(r)
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
/*
function textToElement(html) {
    var div = document.createElement('div')
    div.innerHTML = html.trim()
    return div.firstChild
}
*/
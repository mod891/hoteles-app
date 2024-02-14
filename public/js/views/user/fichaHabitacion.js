var btnReserva = document.getElementById('startReserva');
var confirmarReserva = document.getElementById('confirmaReserva');
var cancelaReserva = document.getElementById('cancelaReserva');
var divInicial = document.getElementById('main');
var divReservando = document.getElementById('reservando');
var dias = 0;
var precio = Number.parseInt(document.getElementById('precio').innerHTML);
btnReserva.addEventListener('click',startReserva);
confirmarReserva.addEventListener('click',crearReserva);
cancelaReserva.addEventListener('click',cancelarReserva);
// intercambiar dos divs con innerHtml rompe las referencias de los eventos
function startReserva() {
    
    divInicial.classList.add('invisible')
    divReservando.classList.remove('invisible')
 
    $('#dtRange').daterangepicker({
        opens: 'center'
      }, function(start, end, label) { // apply btn
        dias = end.diff(start,'days');
        console.log(end.diff(start,'days'),' dias de estancia');
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        mostrarTotal(dias,precio);
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
    let fechaIni, fechaFin, dias, precio;
    var data = {}
    axios.post('api/reservas',{data}).then(r => {
        Swal.fire({
            title: "Reserva creada",
            text: 'Se ha creado una nueva reserva',
            icon: "question",
            showCloseButton: false,
            showCancelButton: false,
            confirmButtonText: 'Ok',
        })
        .then((result) => {
            if (result.isConfirmed) {
                window.location = '/reservas';
            }
        })
    }) 
}



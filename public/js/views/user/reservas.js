// TODO: function rm reserva + swal
var div = document.getElementById('card-reservas-container')

function getReservas() {

    axios.get('../../api/reservas').then(r => {

        if (r.data == "") {
            div.innerHTML = "<p class='text-2xl mt-16 lg:mt-32 pb-24 lg:pb-56'>No ha hecho ninguna reserva </p>"
        } else {
            div.innerHTML = r.data;
        }
    })

}


function rmReserva(obj) {
    Swal.fire({
        title: "Eliminar reserva",
        text: 'Va a eliminar esta reserva, ¿desea continuar?',
        icon: "question",
        showCloseButton: false,
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
    })
    .then((result) => {
        if (result.isConfirmed) {
            axios.delete('../../api/reserva/'+obj.value).then(r => {
                getReservas();
            })
        }
    })  
}

getReservas();
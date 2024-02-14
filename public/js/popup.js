window.popup = function(message) {
    console.log('popup',message)
    if (message == 'habitacion') {
        Swal.fire({
            title: "Habitación creada",
            text: 'Habitación creada, ¿desea crear otra?',
            icon: "question",
            showCloseButton: false,
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
        })
        .then((result) => {
            if (!result.isConfirmed) {
                window.location = '/';
            }
        })
    } 
}


var div = document.getElementById('card-favoritos-container') 

function getFavoritos() {
    axios.get('../../api/favoritos').then(r => {
        if (r.data == "") {
            div.innerHTML = "<p class='text-2xl mt-16 lg:mt-32 pb-24 lg:pb-56'>No tiene habitaciones de hoteles favoritas </p>"
        }
        else {
            div.innerHTML = r.data;
        }
    })

}

getFavoritos();
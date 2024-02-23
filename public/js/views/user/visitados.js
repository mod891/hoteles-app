var div = document.getElementById('card-visitados-container')

function getVisitados() {

    axios.get('../../api/visitados').then(r => {
        if (r.data == "") {
            div.innerHTML = "<p class='text-2xl mt-16 lg:mt-32 pb-24 lg:pb-56'>No ha estado en ningun hotel</p>"
        } else {
            div.innerHTML = r.data;
        }
    })
}

getVisitados();
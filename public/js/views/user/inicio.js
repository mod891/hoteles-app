var div = document.getElementById('cards-container')

function loadRooms() {

    axios.post('../../api/rooms',{data:[]}).then(r => {

        if (r.data == "") {
            div.innerHTML = "<p class='text-2xl mt-16 lg:mt-32 pb-24 lg:pb-56'>No existen habitaciones todavía</p>"
        } else {
            div.innerHTML = r.data;
        }
    })
}

loadRooms();
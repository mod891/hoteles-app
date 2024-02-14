

function loadRooms() {

    axios.post('../../api/rooms',{data:[]}).then(r => {
        document.getElementById('cards-container').innerHTML = r.data;
    })

}

loadRooms();
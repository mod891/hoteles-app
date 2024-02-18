loadTableHotel(1)

function loadTableHotel(page) {
    if (page == 0) return;
    axios.get('/api/hoteles?page='+page).then(r => {
        if (r.data.data.length > 0) {
            dataTableHotel(r.data.data)
            dataPaginacionHotel(r.data)
        } else {
            document.getElementById('table').innerHTML = "<h3>No hay datos</h3>"
        }
    })
} 

function rmHotel(id) {
    axios.delete(`/api/hotel/${id}`).then(r => {
        console.log(r)
        loadTableHotel(1)
    }).catch(error => {
        console.log(error)
        return;
    })
}

function dataTableHotel(data) {
    var tbody = document.getElementById('tbodyHotel')
    tbody.innerHTML = ''
        for (let i=0; i<data.length; i++) {
            var html = `<tr><td>${data[i].nombre}</td><td>${data[i].telefono}</td><td>${data[i].municipio}</td>
                        <td>
                            <a href="/hotel/edit/${data[i].id}"><i class="bi bi-pencil-square"></i></a>
                            <a onClick="rmHotel(${data[i].id})" href="#"><i class="bi bi-trash"></i></a>
                        </td></tr>`
            var row = document.createElement('tr');
            row.innerHTML = html;
            tbody.appendChild(row);
        }
}

function dataPaginacionHotel(data) {
    var div = document.getElementById('paginacionHotel');
    let sig, sigfunc, prev, prevfunc;

    if (data.from < data.last_page) {
        sig = data.from+1;
        sigfunc = 'loadTableHotel('+sig+')';
        prev = data.from-1 >= 1?  data.from-1 :'0'; 
        prevfunc = 'loadTableHotel('+prev+')';
    }
    else if (data.from == data.last_page) {
        sigfunc = 'loadTableHotel(0)'
        prev = data.from-1 >= 1?  data.from-1 :'0'; 
        prevfunc = 'loadTableHotel('+prev+')';
    }
   var html = 
    `<a onClick="${prevfunc}"><i class="bi bi-arrow-left-square mx-6"></i></a>
    <label>${data.from} de ${data.last_page}</label>
    <a onClick="${sigfunc}"><i class="bi bi-arrow-right-square mx-6"></i></a>`;

    div.innerHTML = html;  
}
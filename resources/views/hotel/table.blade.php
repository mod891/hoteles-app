<div>
<!-- -->
    <div class="flex flex-row justify-end">
        <a href="{{ route('hotel.new') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-building-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0"/>
                <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
                <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
            </svg>
        </a>
    </div>
    <div class="flex flex-row">
        <div id="table">
            <table class="calculator">
                <thead>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Municipio</th>
                    <th>Accion</th>
                </thead>
                <tbody id='tbodyHotel'>
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex flex-row justify-center mt-6">
        <div id="paginacionHotel">
        </div>
    </div>
    <br><br>
</div>

<script>
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
</script>
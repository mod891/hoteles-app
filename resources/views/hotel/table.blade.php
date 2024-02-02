<div>
<!-- -->
    <div class="flex flex-row">
        <div id="table">
            <table>
                <thead>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Municipio</th>
                    <th>Accion</th>
                </thead>
                <tbody id='tbody'>
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex flex-row justify-center mt-6">
        <div id="paginacion">
        </div>
    </div>
    <br><br>
</div>

<script>
loadTable(1)

function loadTable(page) {
    if (page == 0) return;
    axios.get('/api/hoteles?page='+page).then(r => {
        if (r.data.data.length > 0) {
            dataTable(r.data.data)
            dataPaginacion(r.data)
        } else {
            document.getElementById('table').innerHTML = "<h3>No hay datos</h3>"
        }
    })
} 
function rm(id) {
    axios.delete(`/api/hotel/${id}`).then(r => {
        console.log(r)
        loadTable(1)
    }).catch(error => {
        console.log(error)
        return;
    })
}
function dataTable(data) {
    var tbody = document.getElementById('tbody')
    tbody.innerHTML = ''
        for (let i=0; i<data.length; i++) {
            var html = `<tr><td>${data[i].nombre}</td><td>${data[i].telefono}</td><td>${data[i].municipio}</td>
                        <td>
                            <a href="#"><i class="bi bi-pencil-square"></i></a>
                            <a onClick="rm(${data[i].id})" href="#"><i class="bi bi-trash"></i></a>
                        </td></tr>`
            var row = document.createElement('tr');
            row.innerHTML = html;
            tbody.appendChild(row);
        }
    

}

function dataPaginacion(data) {
    var div = document.getElementById('paginacion');
    let sig, sigfunc, prev, prevfunc;

    if (data.from < data.last_page) {
        sig = data.from+1;
        sigfunc = 'loadTable('+sig+')';
        prev = data.from-1 >= 1?  data.from-1 :'0'; 
        prevfunc = 'loadTable('+prev+')';
    }
    else if (data.from == data.last_page) {
        sigfunc = 'loadTable(0)'
        prev = data.from-1 >= 1?  data.from-1 :'0'; 
        prevfunc = 'loadTable('+prev+')';
    }
   var html = 
    `<a onClick="${prevfunc}"><i class="bi bi-arrow-left-square mx-6"></i></a>
    <label>${data.from} de ${data.last_page}</label>
    <a onClick="${sigfunc}"><i class="bi bi-arrow-right-square mx-6"></i></a>`;

    div.innerHTML = html;
    
}


/*    
function stringToHtml(str) {
    var temp = document.createElement('div');
    temp.innerHTML = str;
    console.log(temp.firstChild)
    return temp.firstChild;
}
fetch('/api/hoteles?page=2').then(r => {
    r.json().then(data => {
        console.log(data)
    })
})
*/
</script>
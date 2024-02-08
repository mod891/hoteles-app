<div>
<!-- -->
    <div class="flex flex-row justify-end">
        <a href="{{ route('user.new') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
            </svg>
        </a>
    </div>
    <div class="flex flex-row">
        <div id="table">
            <table class="calculator">
                <thead>
                    <tr>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>email</td>
                    <td>teléfono</td>
                    <td>accion</td>
                    </tr>
                </thead>
                <tbody id='tbodyUsuario'>
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex flex-row justify-center mt-6">
        <div id="paginacionUser">
        </div>
    </div>
    <br><br>
</div>

<script>
loadTableUser(1)

function loadTableUser(page) {
    if (page == 0) return;
    axios.get('/api/usuarios?page='+page).then(r => {
        if (r.data.data.length > 0) {
            dataTableUser(r.data.data)
            dataPaginacionUser(r.data)
        } else {
            document.getElementById('table').innerHTML = "<h3>No hay datos</h3>"
        }
    })
} 
function rmUser(id) {
    axios.delete(`/api/user/${id}`).then(r => {
        console.log(r)
        loadTableUser(1)
    }).catch(error => {
        console.log(error)
        return;
    })
}
function dataTableUser(data) {
    var tbody = document.getElementById('tbodyUsuario')
    tbody.innerHTML = ''
        for (let i=0; i<data.length; i++) {
            var html = `<tr><td>${data[i].nombre}</td><td>${data[i].apellidos}</td><td>${data[i].email}</td><td>${data[i].telefono}</td>
                        <td>
                            <a href="/user/edit/${data[i].id}"><i class="bi bi-pencil-square"></i></a>
                            <a onClick="rmUser(${data[i].id})" href="#"><i class="bi bi-trash"></i></a>
                        </td></tr>`
            var row = document.createElement('tr');
            row.innerHTML = html;
            tbody.appendChild(row);
        }
}

function dataPaginacionUser(data) {
    var div = document.getElementById('paginacionUser');
    let sig, sigfunc, prev, prevfunc;

    if (data.from < data.last_page) {
        sig = data.from+1;
        sigfunc = 'loadTableUser('+sig+')';
        prev = data.from-1 >= 1?  data.from-1 :'0'; 
        prevfunc = 'loadTableUser('+prev+')';
    }
    else if (data.from == data.last_page) {
        sigfunc = 'loadTableUser(0)'
        prev = data.from-1 >= 1?  data.from-1 :'0'; 
        prevfunc = 'loadTableUser('+prev+')';
    }
   var html = 
    `<a onClick="${prevfunc}"><i class="bi bi-arrow-left-square mx-6"></i></a>
    <label>${data.from} de ${data.last_page}</label>
    <a onClick="${sigfunc}"><i class="bi bi-arrow-right-square mx-6"></i></a>`;

    div.innerHTML = html;
    
}
</script>
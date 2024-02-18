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
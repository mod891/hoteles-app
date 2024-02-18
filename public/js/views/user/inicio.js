var div = document.getElementById('cards-container')
var imgs = document.querySelectorAll("[id$='Filtro']")
var cbox = document.querySelectorAll('input')

clear()
loadRooms(dataFiltros);

var dataFiltros = { 
    camaMatrimonio: { value:0, active:false},
    balcon: { value:0, active:false},
    minibar: { value:0, active:false},
    fumadores: { value:0, active:false},
    minicadenaWifi: { value:0, active:false},
}

for (let i=0; i<imgs.length; i++) 
    imgs[i].addEventListener('click',toogleFiltros);
for (let i=0; i<cbox.length; i++) 
    cbox[i].addEventListener('click',filtrar);

function clear() {
    for (let i=0; i<cbox.length; i++) {
        cbox[i].checked = false   
        cbox[i].disabled = true
    }
}

// habilita o desabilita el filtrado de alguna característica de la habitación
function toogleFiltros(e) {
    var img = e.target
    let cb = img.nextElementSibling.children[0]
    let label = img.nextElementSibling.children[1]
    let id = e.target.id.slice(0,-6)

    // filtro habilitado
    if (img.classList.contains('disabled')) {
        img.src = "/images/icons/check_yes.png"
        img.classList.remove('disabled')
        img.classList.add('enabled')
        img.title = "filtro habilitado"
        label.classList.remove('text-gray-400')
        dataFiltros[id].active = true
        cb.disabled = false
    }
    // filtro desabilitado
    else if (img.classList.contains('enabled')) {
        img.src = "/images/icons/check_no.png"
        img.classList.remove('enabled')
        img.classList.add('disabled')
        img.title = "filtro desabilitado"
        label.classList.add('text-gray-400')
        dataFiltros[id].active = false
        cb.disabled = true
    }
    loadRooms(dataFiltros)
}

// actualiza el valor de los checkbox y llama al backend 
function filtrar(e) {
    let id = e.target.id
    let val = e.target.checked? 1:0
    dataFiltros[id].value = val
    loadRooms(dataFiltros)
}

// llama al backend con los filtros y actualiza el contenido de la página
function loadRooms(filtros) {
    axios.post('../../api/rooms',filtros).then(r => {
        if (r.data == "") {
            div.innerHTML = "<p class='text-2xl mt-16 lg:mt-32 pb-24 lg:pb-56'>No existen habitaciones con ese criterio</p>"
        } else {
            div.innerHTML = r.data;
        }
    })
}


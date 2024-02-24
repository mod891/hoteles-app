var div = document.getElementById('cards-container')
var cbox = document.querySelectorAll('input')
var select = document.getElementById('provincia')

var dataFiltros = { 
    camaMatrimonio: 0, 
    balcon: 0,
    minibar: 0,
    fumadores: 0, 
    minicadenaWifi: 0, 
    fechaIni: '',
    fechaFin: '',
    provincia: '',
}

init();

function init() {
    
    $('#fecharg').daterangepicker({
        opens: 'center',
        minDate: new Date(),
        
      }, function(start, end, label) { 
        dataFiltros.fechaIni = start.format('YYYY-MM-DD')
        dataFiltros.fechaFin = end.format('YYYY-MM-DD')
        loadRooms(dataFiltros);
    });

    for (let i=0; i<cbox.length; i++) 
        cbox[i].addEventListener('click',filtrar);

    select.addEventListener('change',filtrar)

    clear()
    getProvincias()
    loadRooms(dataFiltros);
}

function clear() {
    for (let i=0; i<cbox.length; i++) {
        cbox[i].checked = false   
    }
}

// actualiza el valor de los checkbox y llama al backend 
function filtrar(e) {
    let id = e.target.id
    let val = e.target.checked? 1:0
    dataFiltros[id] = val
    //if (select.value != 0)
    dataFiltros.provincia = select.value

    if (dataFiltros.fechaIni != '' && dataFiltros.fechaFin != '' )
        loadRooms(dataFiltros)
}

// llama al backend con los filtros y actualiza el contenido de la página
function loadRooms(filtros) {
    axios.post('../../api/hotels',filtros).then(r => {
        div.innerHTML = r.data;
    })
}

// carga las provincias de hoteles disponibles
function getProvincias() {
    axios.get('../../api/provincias').then(r => {
        for (let i=0; i<r.data.length; i++) {
            let option = document.createElement('option')
            option.text = r.data[i].provincia;
            option.value = r.data[i].provincia;
            select.add(option)
        }
    })
}

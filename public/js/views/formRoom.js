var rds = document.querySelectorAll('input[type=radio]');
var descripcion = document.getElementById('descripcion')
var inputHotel = document.getElementById('idHotel');
inputHotel.value = window.location.pathname.split('/')[3]
// clear inputs
rds.forEach(e => e.checked = false) 
descripcion.value = ''

//var fumadores = document.getElementByName('fumadores')
rds.forEach(e => e.addEventListener('change',updtVal))


var strDescripcion = {fumadores: {0:'no se admiten fumadores',1:'se admiten fumadores'}}
function updtVal(e) { // buscar str, si/no, rm str. add str
    //if (e.target.name == e.target.name) {

    /*
        if (descripcion.value.indexOf(strDescripcion[e.target.name][0]) != -1) {
            descripcion.value = descripcion.value.replace(strDescripcion[e.target.name][0],'')
        } else
        if (descripcion.value.indexOf(strDescripcion[e.target.name][1]) != -1)
            descripcion.value = descripcion.value.replace(strDescripcion[e.target.name][0],'')

        console.log(descripcion.value.indexOf(strDescripcion[e.target.name][0]),descripcion.value.indexOf(strDescripcion[e.target.name][1]))

        descripcion.value += strDescripcion[e.target.name][e.target.value]

        */
    //console.log(e.target.value,e.target.name)
}
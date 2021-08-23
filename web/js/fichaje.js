
window.onload=function() {

  document.getElementById("personal-codigo").focus();


sessionStorage.clear();
}
function ponerFocus(){
  document.getElementById("personal-codigo").focus();

}
function myFunction() {
  // Get the text field that we're going to track
var field = document.getElementById("personal-codigo");
var cantidad ;

// See if we have an autosave value
// (this will only happen if the page is accidentally refreshed)
if (sessionStorage.getItem("autosave")) {
  // Restore the contents of the text field
  field.value = sessionStorage.getItem("autosave");
}

// Listen for changes in the text field
field.addEventListener("change", function() {
  // And save the results into the session storage object
  sessionStorage.setItem("autosave", field.value);
});
var indices = [];
for(var i = 0; i < field.value.length; i++) {
	if (field.value.charAt(i) == '"'){
    indices.push(i);
  }

// 00207981533"RELMUAN"ELIAS GERONIMO"M"32578325"A"30-08-1986"08-10-2013
}
if (indices.length===7) {
    indice= 4;
  if (field.value.charAt(0) =='"'){
    indice= 1;
    console.log(field.value.charAt(0));

  }

var csrfToken = $('meta[name="csrf-token"]').attr("content");
let cant=field.value;
var  dni = cant.split('"') ;
console.log(dni);

    var url = '?r=personal%2Ffichado' ;
    var form = $('<form action="' + url + '" method="post">' +
      '<input type="hidden" name="dni" value="' +dni[indice] + '" />' +
      '<input type="hidden" name="_csrf" value="'+csrfToken+'" />'+
      '</form>');
    $('body').append(form);
    form.submit();

}

}

function laHoraEs () {
    var fecha = new Date();

  var horas = fecha.getHours(),
    minutos = fecha.getMinutes(),
    segundos = fecha.getSeconds(),
    diaSemana = fecha.getDay(),
    dia = fecha.getDate(),
    mes = fecha.getMonth(),
    year = fecha.getFullYear();

  var semana = [
    'Domingo',
    'Lunes',
    'Martes',
    'Miércoles',
    'Jueves',
    'Viernes',
    'Sábado'
  ];

  var meses = [
    'Enero',
    'Febrero',
    'Marzo',
    'Abril',
    'Mayo',
    'Junio',
    'Julio',
    'Agosto',
    'Septiembre',
    'Octubre',
    'Noviembre',
    'Diciembre'
  ];

   if (dia < 10) {
    dia = "0" + dia
  }
  var pSemana = document.getElementById('diaSemana')
  pSemana.textContent = semana[diaSemana] +", "
  var pDia = document.getElementById('dia')
    pDia.textContent = dia

  var pMes = document.getElementById('mes')
    pMes.textContent = meses[mes]

  var mYear = document.getElementById('year')
    mYear.textContent = year

   if (horas < 10) {
    horas = "0" + horas
  }
  var pHora = document.getElementById('horas')
    pHora.textContent = horas

    if (minutos < 10) {
    minutos = "0" + minutos
  }
  var pMinuto = document.getElementById('minutos')
    pMinuto.textContent = minutos

  // if (segundos < 10) {
  //   segundos = "0" + segundos
  // }
  // var pSegundos = document.getElementById('segundos')
  //   pSegundos.textContent = segundos
}

setInterval(laHoraEs,1000)

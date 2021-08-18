<?php
// use kartik\form\ActiveForm;
use yii\web\JsExpression;
use yii\bootstrap\Modal;
use kartik\dialog\Dialog;
use kartik\widgets\ActiveForm;
use kartik\widgets\AlertBlock;
use quidu\ajaxcrud\CrudAsset;
use app\models\Fichajes;

// use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Fichero - Hospital Zatti';
CrudAsset::register($this);

?>
<div class="site-index">

     <?php if(Yii::$app->session->getFlash('success')) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario. ?>
         <script>
         $(document).ready(function()
         {
           // id de nuestro modal
           $("#w9").modal("show");
         });
         setTimeout(function() {
             $(".modal").fadeOut(1500);
             $(".modal").modal('hide');

         },4000);
         setTimeout(function() {
             // $(".modal").fadeOut(1500);
             // $(".modal").modal('hide');
             window.location.href = "/fichaje/web/index.php";

         },6000);
         // Simulate a mouse click:
         </script>
     <?php endif; ?>

<style>
  @import url('https://fonts.googleapis.com/css?family=Google+Sans');
  /*--------------*/
.modal {width: 100%;
height: 100%;
}


  body {
        background: url(../imagenes/configuration_13194.png.JPG) no-repeat center center;
  	background: url(../web/Header.jpg);
  	/*font-size: 36px;*/
  	/* color: #fff; */

  }
  #fichado {
  color: #fff; }
.reloj , .fecha  , .lead{
color: #fff; }
  .wrap {
    display: flex;
    /* justify-content: center;
    align-items: center; */
    width: 100%;
    height: 100%;
    position: absolute;
  }

  .widget {
  /* 	width: 600px; */
  	margin: 25px;
  }

  .widget p {
  	display: inline;
    position: relative;
  }

  .fecha {
  	font-family: 'Google Sans', sans-serif;
  	text-align: center;
  	font-size: 2em;
  	padding: 20px;
  	width: 100%;
  	background: rgb(0, 0, 0, .7);
  	margin-bottom: 5px;
    box-sizing: border-box;
    border-radius: 25px 25px 0 0
  }

  .reloj {
  	font-family: 'Google Sans';
  	text-align: center;
  	font-size: 4.5em;
  	padding: 20px;
  	width: 100%;
  	background: rgb(0, 0, 0, .7);
    box-sizing: border-box;
    border-radius: 0 0 25px 25px
  }

  /* .reloj .caja-segundos {
  	display: inline-block;
  } */
  /* .bootstrap-dialog.type-success .modal-header {
    background-color: #28a745;
} */

  </style>
<script>
window.onload=function() {

  document.getElementById("personal-codigo").focus();
sessionStorage.clear();
}
function myFunction(event) {
  // Get the text field that we're going to track
// var field = document.getElementById("personal-codigo");
  var valor= event.target.value;

if (valor.length===4) {

var csrfToken = $('meta[name="csrf-token"]').attr("content");
let codigo=valor;
// var  codigo = cant.split('"') ;
    var url = '?r=personal%2Ffichado' ;
    var form = $('<form action="' + url + '" method="post">' +
      '<input type="hidden" name="codigo" value="' +codigo + '" />' +
      '<input type="hidden" name="_csrf" value="'+csrfToken+'" />'+
      '</form>');
    $('body').append(form);
    form.submit();

}

}
</script>
<script>
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
</script>

    <div class="jumbotron">
        <!-- <h1>Sistema de fichado</h1> -->
        <p>
          <h1><div id="fichado" >SISTEMA DE FICHADO </div></h1>
      </p>
        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
          <div class="wrap">
          <div class="widget">
             <div class="fecha">
                 <p id="diaSemana" class="diaSemana"></p>
                 <p id="dia" class="dia"></p>
                 <p>de </p>
                 <p id="mes" class="mes"></p>
                 <p>del </p>
                 <p id="year" class="year"></p>
             </div>
             <div class="reloj">
                 <span id="horas" class="horas"></span>
                 <span>:</span>
                 <span id="minutos" class="minutos"></span>
                 <!-- <span>:</span>
                 <span id="segundos" class="segundos"></span> -->
             </div>
          </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
        </br>
        </br>
        </br>
        </br>
          <p class="lead">CODIGO</p>

            <input   type="password" onInput="myFunction(event)" id="personal-codigo" class="form-control" name="Personal[codigo]"  aria-required="true" aria-invalid="true">
       </div>

    </div>


</div>


<!--  -->
   <!-- <div class="modal fade" id="modalUsado" role="dialog"> -->
<!-- <div id="modalUsado" class="modal bootstrap-dialog type-info fade size-wide show" role="dialog" aria-labelledby="w9_title" tabindex="-1" aria-modal="true" style="padding-right: 10px; z-index: 1050; display: block;"> -->
<? $hola="saludo"; ?>

<div id="w9" class="modal bootstrap-dialog type-info fade size-wide show" role="dialog" aria-labelledby="w9_title" tabindex="-1" aria-modal="true" style="padding-right: 10px; z-index: 1050; display: block;"><div class="modal-dialog modal-xl"><div class="modal-content"><div class="modal-header bootstrap-dialog-header bootstrap-dialog-draggable"><div class="bootstrap-dialog-title" id="w9_title">NOTIFICACIÓN</div><div class="bootstrap-dialog-close-button"><button class="close" data-dismiss="modal" aria-label="close">×</button></div></div><div class="modal-body"><div class="bootstrap-dialog-body"><div class="bootstrap-dialog-message">    <div class="row">
          <div class="col-6">
              <h4 class="text-center"><?
              if (!empty($fichados)){
                echo $personal->nombre." ".$personal->apellido ;
              }
                ?>
             </h4>
              <table class="table">
                <thead>

                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">HORA DE ENTRADA</th>
                    <th scope="col">HORA DE SALIDA</th>
                    <th scope="col">CANT. HORAS</th>
                  </tr>
                </thead>
                <tbody>

                <?

                if (!empty($fichados)){

                  $cant=0;
                   foreach ($fichados as $fichado) {?>
                  <tr>
                    <th scope="row"><?=$cant?></th>
                    <td><?=$fichado->hora_ingreso ?></td>
                    <td><?=$fichado->hora_salida  ?></td>
                    <td><?=$fichado->cant_horas  ?></td>
                  </tr>
                <?  $cant ++;}} ?>
                </tbody>
              </table>
          </div>

      </div>
  </div></div></div><div class="modal-footer"><div class="bootstrap-dialog-footer"><div class="bootstrap-dialog-footer-buttons"></div></div></div></div></div></div>

<?

  // Custom dialog 2
  echo Dialog::widget([
      'libName' => 'krajeeDialogCust2', // a custom lib name
      'options' => [  // customized BootstrapDialog options
          'size' => Dialog::SIZE_WIDE, // large dialog text
          'type' => Dialog::TYPE_INFO, // bootstrap contextual color
          'title' => 'My Dialog',
          'nl2br' => false,
          'buttons' => [
              [
                  'id' => 'cust-submit-btn',
                  'label' => 'Submit',
                  'cssClass' => 'btn-primary',
                  'hotkey' => 'S',
                  'action' => new JsExpression("function(dialog) {
                      if (typeof dialog.getData('callback') === 'function' && dialog.getData('callback').call(this, true) === false) {
                          return false;
                      }

                      return dialog.close();
                  }")
              ],
              [
                  'id' => 'cust-cancel-btn',
                  'label' => 'Cancel',
                  'cssClass' => 'btn-outline-secondary',
                  'hotkey' => 'C',
                  'action' => new JsExpression("function(dialog) {
                      if (typeof dialog.getData('callback') === 'function' && dialog.getData('callback').call(this, false) === false) {
                          return false;
                      }

                      return dialog.close();
                  }")
              ],
          ]
      ]
  ]);

  // button markups for launching the custom krajee dialog box

  // javascript for triggering the dialogs

?>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>

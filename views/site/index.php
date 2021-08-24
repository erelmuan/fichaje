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
<style>
body {
  background: url(../web/verde.jpg)no-repeat center center;
    /* background: blue;
  font-size: 36px;
  color: #fff; */


}

</style>
<div class="site-index">

     <?php

     if(Yii::$app->session->getFlash('success')) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario.
      //if(true) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario. ?>

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




    <div class="jumbotron">
        <!-- <h1>Sistema de fichado</h1> -->
        <p>
          <h1><div id="fichado" >SISTEMA DE CONTROL </div></h1>
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
          <p id="codigo">CÓDIGO</p>

            <input   type="password" onkeypress="myFunction()" id="personal-codigo" class="form-control" name="Personal[codigo]" onBlur="ponerFocus()" />
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
                    <th class="col">#</th>
                    <th class="col">HORA DE ENTRADA</th>
                    <th class="col">HORA DE SALIDA</th>
                    <th class="col">CANT. HORAS</th>
                  </tr>
                </thead>
                <tbody>

                <?

                if (!empty($fichados)){

                  $cant=0;
                   foreach ($fichados as $fichado) {?>
                  <tr>
                    <th class="row"><?=$cant?></th>
                    <td class="row"><?=$fichado->hora_ingreso ?></td>
                    <td class="row" ><?=$fichado->hora_salida  ?></td>
                    <td class="row"><?=$fichado->cant_horas  ?></td>
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

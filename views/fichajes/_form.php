<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fichajes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fichajes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_ingreso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fi')->textInput() ?>

    <?= $form->field($model, 'hora_ingreso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_salida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fs')->textInput() ?>

    <?= $form->field($model, 'hora_salida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'persona')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cant_horas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'licencia')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

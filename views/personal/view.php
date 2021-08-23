<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Personal */
?>
<div class="personal-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codigo',
            'legajo',
            'dni',
            'apellido',
            'nombre',
            'direccion',
            'telefono',
            'titulo',
            'sexo',
            'fecha_ingreso',
            'estado',
            'servicio',
            'departamento',
            'hs_trabajo',
        ],
    ]) ?>

</div>

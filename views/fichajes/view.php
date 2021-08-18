<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Fichajes */
?>
<div class="fichajes-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fecha_ingreso',
            'fi',
            'hora_ingreso',
            'fecha_salida',
            'fs',
            'hora_salida',
            'persona',
            'cant_horas',
            'observaciones',
            'licencia',
        ],
    ]) ?>

</div>

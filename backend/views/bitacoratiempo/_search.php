<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\BitacoraTiempoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bitacora-tiempo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'hora_inicio') ?>

    <?= $form->field($model, 'hora_final') ?>

    <?= $form->field($model, 'interrupcion') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'actividad_noplaneada') ?>

    <?php // echo $form->field($model, 'id_actividad') ?>

    <?php // echo $form->field($model, 'id_proyecto') ?>

    <?php // echo $form->field($model, 'artefacto') ?>

    <?php // echo $form->field($model, 'id_usuario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

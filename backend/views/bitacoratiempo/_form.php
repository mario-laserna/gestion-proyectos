<?php

use app\models\Proyecto;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BitacoraTiempo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bitacora-tiempo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'hora_inicio')->textInput() ?>

    <?= $form->field($model, 'hora_final')->textInput() ?>

    <?= $form->field($model, 'interrupcion')->textInput() ?>

    <?= $form->field($model, 'actividad_noplaneada')->textInput(['maxlength' => true]) ?>

    <?php
    $proyectos = ArrayHelper::map(Proyecto::find()->where(['activo'=>1])->orderBy('nombre')->all(), 'id', 'nombre');
    ?>
    <?= $form->field($model, 'id_proyecto')->dropDownList($proyectos) ?>

    <?= $form->field($model, 'artefacto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

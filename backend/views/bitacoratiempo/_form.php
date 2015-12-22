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

    <?=
        $form->field($model, 'fecha')->widget(\yii\jui\DatePicker::className(), [
            'dateFormat' => 'dd-MM-yyyy',
            'value' => date('d/m/Y'),
            'options' => ['style' => 'position: relative; z-index: 999', 'class'=>'form-control'],
        ])
    ?>

    <?=
        $form->field($model, 'hora_inicio')->widget(\kartik\time\TimePicker::className(), [
            'pluginOptions' => ['minuteStep'=>1]
        ])
    ?>

    <?= $form->field($model, 'hora_final')->widget(\kartik\time\TimePicker::className(), [
            'pluginOptions' => ['minuteStep'=>1]
        ])
    ?>

    <?= $form->field($model, 'interrupcion')->textInput() ?>

    <?= $form->field($model, 'actividad_noplaneada')->textInput(['maxlength' => true]) ?>

    <?php
        $proyectos = ArrayHelper::map(Proyecto::find()->where(['activo'=>1])->orderBy('nombre')->all(), 'id', 'nombre');
        echo $form->field($model, 'id_proyecto')->widget(\kartik\select2\Select2::className(), [
            'data' => $proyectos,
            'language' => 'es',
            'options' => ['placeholder'=>'Seleccione un proyecto...'],
            'pluginOptions' => [
                'allowClear'=>true
            ]
        ]);
    ?>

    <?= $form->field($model, 'artefacto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

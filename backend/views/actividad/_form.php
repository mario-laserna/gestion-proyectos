<?php

use app\models\Proyecto;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Actividad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?php
    if(!$model->isNewRecord)
        echo $form->field($model, 'activo')->checkbox();
    ?>

    <?php
    if($bandera){
        $proyectos = ArrayHelper::map(Proyecto::find()->where(['activo'=>1])->orderBy('nombre')->all(), 'id', 'nombre');
    ?>
        <?= $form->field($model, 'id_proyecto')->dropDownList($proyectos) ?>
    <?php
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

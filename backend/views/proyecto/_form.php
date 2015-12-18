<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Proyecto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyecto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?php
        if(!$model->isNewRecord) {
            echo $form->field($model, 'activo')->checkbox();
    ?>
        <h2>Actividades</h2>
        <?=
            \yii\grid\GridView::widget([
                'dataProvider' => new \yii\data\ActiveDataProvider([
                    'query' => $model->getActividades(),
                    'pagination' => false
                ]),
                'columns' => [
                    'nombre',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'controller' => 'actividad',
                        'header' => Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;Agregar nueva', ['actividad/create-con-proyecto', 'idProyecto'=>$model->id]),
                    ],
                ],
            ]);
        ?>

    <?php
        }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

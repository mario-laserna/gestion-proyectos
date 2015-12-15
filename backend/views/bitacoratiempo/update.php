<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BitacoraTiempo */

$this->title = 'Update Bitacora Tiempo: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bitacora Tiempos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bitacora-tiempo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

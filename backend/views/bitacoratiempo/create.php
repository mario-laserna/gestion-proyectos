<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BitacoraTiempo */

$this->title = 'Create Bitacora Tiempo';
$this->params['breadcrumbs'][] = ['label' => 'Bitacora Tiempos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bitacora-tiempo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

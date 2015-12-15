<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\BitacoraTiempoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bitacora Tiempos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bitacora-tiempo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bitacora Tiempo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fecha',
            'hora_inicio',
            'hora_final',
            'interrupcion',
            // 'total',
            // 'actividad_noplaneada',
            // 'id_actividad',
            // 'id_proyecto',
            // 'artefacto',
            // 'id_usuario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

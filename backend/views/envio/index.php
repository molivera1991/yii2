<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EnvioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Envios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="envio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Envio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'EnvioId',
            'EnvioCreado',
            'EnvioEstado',
            'UsuarioDespachador',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

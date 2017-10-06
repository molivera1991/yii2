<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ComercioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comercios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comercio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Comercio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ComercioId',
            'ComercioNombre',
            'ComercioLatitud',
            'ComercioLongitud',
            'ComercioLogo',
            // 'ComercioGerente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

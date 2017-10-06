<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PedidoproductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidoproductos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedidoproducto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pedidoproducto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PedidoId',
            'ProductoId',
            'PedidoProductoCantidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

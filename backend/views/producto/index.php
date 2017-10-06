<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ProductoId',
            'ProductoNombre',
            'ProductoCodigoBarra',
            'ProductoPrecio',
            'ProductoStock',
            // 'ProductoImagen1',
            // 'ProductoImagen2',
            // 'ProductoImagen3',
            // 'ProductoCategoria',
            // 'ProductoComercio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

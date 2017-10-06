<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pedidoproducto */

$this->title = $model->PedidoId;
$this->params['breadcrumbs'][] = ['label' => 'Pedidoproductos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedidoproducto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'PedidoId' => $model->PedidoId, 'ProductoId' => $model->ProductoId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'PedidoId' => $model->PedidoId, 'ProductoId' => $model->ProductoId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PedidoId',
            'ProductoId',
            'PedidoProductoCantidad',
        ],
    ]) ?>

</div>

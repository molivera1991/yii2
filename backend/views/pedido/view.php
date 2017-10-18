<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pedido */

$this->title = $model->PedidoId;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PedidoId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PedidoId], [
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
            'PedidoEstado',
            'PedidoCreado',
            'PedidoDestinoLatitud',
            'PedidoDestinoLonguitud',
            'PedidoNumeroSeguimiento',
            'PedidoCliente',
            'PedidoEnvio',
            'PedidoOrdenEnvio',
        ],
    ]) ?>

</div>

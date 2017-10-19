<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pedido */

$this->title = 'Update Pedido: ' . $model->PedidoId;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PedidoId, 'url' => ['view', 'id' => $model->PedidoId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

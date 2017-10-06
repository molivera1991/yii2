<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pedidoproducto */

$this->title = 'Update Pedidoproducto: ' . $model->PedidoId;
$this->params['breadcrumbs'][] = ['label' => 'Pedidoproductos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PedidoId, 'url' => ['view', 'PedidoId' => $model->PedidoId, 'ProductoId' => $model->ProductoId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pedidoproducto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

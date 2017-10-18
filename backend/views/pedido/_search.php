<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PedidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PedidoId') ?>

    <?= $form->field($model, 'PedidoEstado') ?>

    <?= $form->field($model, 'PedidoCreado') ?>

    <?= $form->field($model, 'PedidoDestinoLatitud') ?>

    <?= $form->field($model, 'PedidoDestinoLonguitud') ?>

    <?php // echo $form->field($model, 'PedidoNumeroSeguimiento') ?>

    <?php // echo $form->field($model, 'PedidoCliente') ?>

    <?php // echo $form->field($model, 'PedidoEnvio') ?>

    <?php // echo $form->field($model, 'PedidoOrdenEnvio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

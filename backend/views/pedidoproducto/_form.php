<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pedidoproducto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedidoproducto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PedidoId')->textInput() ?>

    <?= $form->field($model, 'ProductoId')->textInput() ?>

    <?= $form->field($model, 'PedidoProductoCantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

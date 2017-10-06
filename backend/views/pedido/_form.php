<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PedidoEstado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PedidoCreado')->textInput() ?>

    <?= $form->field($model, 'PedidoDestinoLatitud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PedidoDestinoLonguitud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PedidoNumeroSeguimiento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PedidoCliente')->textInput() ?>

    <?= $form->field($model, 'PedidoEnvio')->textInput() ?>

    <?= $form->field($model, 'PedidoOrdenEnvio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

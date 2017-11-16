<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\Pedidoproducto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedidoproducto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PedidoId')->widget(Select2::classname(), [
            'data' => $model->comboPedido,
            'options' => ['placeholder' => 'Seleccione Pedido','style'=>'width:250px;'],
            'pluginOptions' => [
            'allowClear' => true
            ],
            ]);
    ?>

    <?= $form->field($model, 'ProductoId')->widget(Select2::classname(), [
            'data' => $model->comboProducto,
            'options' => ['placeholder' => 'Seleccione Producto','style'=>'width:250px;'],
            'pluginOptions' => [
            'allowClear' => true
            ],
            ]);
    ?>

    <?= $form->field($model, 'PedidoProductoCantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

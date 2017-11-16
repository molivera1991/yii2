<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\Envio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="envio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $fechaActual = strftime( "%Y-%m-%d %H:%M:%S", time() );  //Toma la fecha de hoy en el formato que quiero
    $model->EnvioCreado=$fechaActual;
    ?>

    <?= $form->field($model, 'EnvioCreado')->textInput(['readonly' => true, 'value' => $fechaActual]) ?>

    <?= $form->field($model, 'EnvioEstado')->widget(Select2::classname(), [
            'data' => ['Creado' => 'Creado', 'Devuelto' => 'Devuelto','Enviado' => 'Enviado', 'Entregado' => 'Entregado'],
            'options' => ['placeholder' => 'Seleccione Estado del Envio','style'=>'width:250px;'],
            'pluginOptions' => [
            'allowClear' => true
            ],
            ]);
    ?>


    <?= $form->field($model, 'UsuarioDespachador')->widget(Select2::classname(), [
            'data' => $model->comboUsuario,
            'options' => ['placeholder' => 'Seleccione Despachador del Pedido','style'=>'width:250px;'],
            'pluginOptions' => [
            'allowClear' => true
            ],
            ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

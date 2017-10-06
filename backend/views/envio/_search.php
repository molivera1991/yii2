<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="envio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'EnvioId') ?>

    <?= $form->field($model, 'EnvioCreado') ?>

    <?= $form->field($model, 'EnvioEstado') ?>

    <?= $form->field($model, 'UsuarioDespachador') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

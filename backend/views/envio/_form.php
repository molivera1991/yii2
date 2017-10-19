<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Envio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="envio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'EnvioId')->textInput() ?>

    <?= $form->field($model, 'EnvioCreado')->textInput() ?>

    <?= $form->field($model, 'EnvioEstado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UsuarioDespachador')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ComercioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comercio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ComercioId') ?>

    <?= $form->field($model, 'ComercioNombre') ?>

    <?= $form->field($model, 'ComercioLatitud') ?>

    <?= $form->field($model, 'ComercioLongitud') ?>

    <?= $form->field($model, 'ComercioLogo') ?>

    <?php // echo $form->field($model, 'ComercioGerente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ProductoId') ?>

    <?= $form->field($model, 'ProductoNombre') ?>

    <?= $form->field($model, 'ProductoCodigoBarra') ?>

    <?= $form->field($model, 'ProductoPrecio') ?>

    <?= $form->field($model, 'ProductoStock') ?>

    <?php // echo $form->field($model, 'ProductoImagen1') ?>

    <?php // echo $form->field($model, 'ProductoImagen2') ?>

    <?php // echo $form->field($model, 'ProductoImagen3') ?>

    <?php // echo $form->field($model, 'ProductoCategoria') ?>

    <?php // echo $form->field($model, 'ProductoComercio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

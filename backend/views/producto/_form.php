<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ProductoNombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ProductoCodigoBarra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ProductoPrecio')->textInput() ?>

    <?= $form->field($model, 'ProductoStock')->textInput() ?>

    <?= $form->field($model, 'ProductoImagen1')->textInput() ?>

    <?= $form->field($model, 'ProductoImagen2')->textInput() ?>

    <?= $form->field($model, 'ProductoImagen3')->textInput() ?>

    <?=$form->field($model, 'ProductoCategoria')->dropDownList($model->comboCategoria)?>

    <?= $form->field($model, 'ProductoComercio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

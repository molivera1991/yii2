<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Comercio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comercio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ComercioNombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ComercioLatitud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ComercioLongitud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ComercioLogo')->textInput() ?>

    <?= $form->field($model, 'ComercioGerente')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

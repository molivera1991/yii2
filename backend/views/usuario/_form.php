<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'UsuarioNombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UsuarioApellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UsuarioCI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UsuarioMail')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

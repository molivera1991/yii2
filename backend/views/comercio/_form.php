<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Comercio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comercio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ComercioNombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ComercioLatitud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ComercioLongitud')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'file')->widget(FileInput::classname(), [
          'options' => ['accept' => 'image/*'],
               'pluginOptions'=>['allowedFileExtensions'=>['jpg','png'],'showUpload' => false,],
          ]);   ?>

    <?= $form->field($model, 'ComercioGerente')->widget(Select2::classname(), [
            'data' => $model->comboUsuario,
            'options' => ['placeholder' => 'Seleccione un Usuario Gerente','style'=>'width:250px;'],
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

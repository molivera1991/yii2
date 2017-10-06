<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Categoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categoria-form">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'CategoriaNombre')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'file')->widget(FileInput::classname(), [
          'options' => ['accept' => 'image/*'],
               'pluginOptions'=>['allowedFileExtensions'=>['jpg','png'],'showUpload' => false,],
          ]);   ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

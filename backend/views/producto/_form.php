<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;
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

    <?=  $form->field($model, 'file')->widget(FileInput::classname(), [
          'options' => ['accept' => 'image/*'],
               'pluginOptions'=>['allowedFileExtensions'=>['jpg','png'],'showUpload' => false,],
          ]);   ?>

          <?=  $form->field($model, 'file2')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                     'pluginOptions'=>['allowedFileExtensions'=>['jpg','png'],'showUpload' => false,],
                ]);   ?>

                <?=  $form->field($model, 'file3')->widget(FileInput::classname(), [
                      'options' => ['accept' => 'image/*'],
                           'pluginOptions'=>['allowedFileExtensions'=>['jpg','png'],'showUpload' => false,],
                      ]);   ?>

    <?= $form->field($model, 'ProductoCategoria')->widget(Select2::classname(), [
            'data' => $model->comboCategoria,
            'options' => ['placeholder' => 'Seleccione una Categoria de Producto','style'=>'width:250px;'],
            'pluginOptions' => [
            'allowClear' => true
            ],
            ]);
    ?>

    <?= $form->field($model, 'ProductoComercio')->widget(Select2::classname(), [
            'data' => $model->comboComercio,
            'options' => ['placeholder' => 'Seleccione Comercio que vende Producto','style'=>'width:250px;'],
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

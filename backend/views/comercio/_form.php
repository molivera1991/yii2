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

    <div id="map"  style="width: 100%; height: 500px; position: relative; overflow: hidden;"></div>

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





    <script>
    // The following example creates a marker in Stockholm, Sweden using a DROP
    // animation. Clicking on the marker will toggle the animation between a BOUNCE
    // animation and no animation.

    var marker;

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          //mapTypeId: 'satellite',
        <?php if(is_null($model->ComercioLatitud) and  is_null($model->ComercioLongitud)){ ?>
          center: {lat: -34.894507057365544, lng: -56.15281297016145}
        <?php }else{ ?>
          center: {lat: <?php echo $model->ComercioLatitud; ?>, lng: <?php echo $model->ComercioLongitud; ?>}
        <?php } ?>
        });

        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          <?php if(is_null($model->ComercioLatitud) and is_null($model->ComercioLongitud)){ ?>
            position: {lat: -34.894507057365544, lng: -56.15281297016145}
          <?php }else{ ?>
            position: {lat: <?php echo $model->ComercioLatitud; ?>, lng: <?php echo $model->ComercioLongitud; ?>}
          <?php } ?>
        });
        document.getElementsByName("Comercio[ComercioLatitud]")[0].value = marker.getPosition().lat();
        document.getElementsByName("Comercio[ComercioLongitud]")[0].value = marker.getPosition().lng();
        marker.addListener('dragend', actualizarposicion);
      }

      function actualizarposicion() {
          var markerLatLng = marker.getPosition();
        document.getElementsByName("Comercio[ComercioLatitud]")[0].value = markerLatLng.lat();
        document.getElementsByName("Comercio[ComercioLongitud]")[0].value = markerLatLng.lng();
          //alert(markerLatLng.lat());
          //alert(markerLatLng.lng());
          var infowindow = new google.maps.InfoWindow({
           content: 'Latitud: ' + markerLatLng.lat() + '<br>Longitud: ' + markerLatLng.lng()
          });
        infowindow.open(map,marker);
        }
    </script>

    <?php ActiveForm::end(); ?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSWWdrxFbtSdqOCuM-kCG5VinGs_xNzgo&callback=initMap"
    async defer></script>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $fechaActual = strftime( "%Y-%m-%d %H:%M:%S", time() );  //Toma la fecha de hoy en el formato que quiero
    $model->PedidoCreado=$fechaActual;
    $seguimientogenerado = hash('ripemd160', $fechaActual);
    ?>

    <?= $form->field($model, 'PedidoEstado')->widget(Select2::classname(), [
            'data' => ['Nuevo' => 'Nuevo', 'Devuelto' => 'Devuelto','Despachado' => 'Despachado', 'Entregado' => 'Entregado'],
            'options' => ['placeholder' => 'Seleccione Estado del Pedido','style'=>'width:250px;'],
            'pluginOptions' => [
            'allowClear' => true
            ],
            ]);
    ?>


    <?= $form->field($model, 'PedidoCreado')->textInput(['readonly' => true, 'value' => $fechaActual]) ?>


    <?= $form->field($model, 'PedidoNumeroSeguimiento')->textInput(['maxlength' => true,'readonly' => true, 'value' => $seguimientogenerado]) ?>


    <?= $form->field($model, 'PedidoCliente')->widget(Select2::classname(), [
            'data' => $model->comboUsuario,
            'options' => ['placeholder' => 'Seleccione Cliente del Pedido','style'=>'width:250px;'],
            'pluginOptions' => [
            'allowClear' => true
            ],
            ]);
    ?>

    <?= $form->field($model, 'PedidoDestinoLatitud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PedidoDestinoLonguitud')->textInput(['maxlength' => true]) ?>

    <div id="map"  style="width: 100%; height: 500px; position: relative; overflow: hidden;"></div>

    <?= $form->field($model, 'PedidoEnvio')->widget(Select2::classname(), [
            'data' => $model->comboEnvio,
            'options' => ['placeholder' => 'Seleccione Envio Asociado al Pedido','style'=>'width:250px;'],
            'pluginOptions' => [
            'allowClear' => true
            ],
            ]);
    ?>

    <?= $form->field($model, 'PedidoOrdenEnvio')->textInput() ?>

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
        <?php if(is_null($model->PedidoDestinoLatitud) and  is_null($model->PedidoDestinoLonguitud)){ ?>
          center: {lat: -34.894507057365544, lng: -56.15281297016145}
        <?php }else{ ?>
          center: {lat: <?php echo $model->PedidoDestinoLatitud; ?>, lng: <?php echo $model->PedidoDestinoLonguitud; ?>}
        <?php } ?>
        });

        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          <?php if(is_null($model->PedidoDestinoLatitud) and is_null($model->PedidoDestinoLonguitud)){ ?>
            position: {lat: -34.894507057365544, lng: -56.15281297016145}
          <?php }else{ ?>
            position: {lat: <?php echo $model->PedidoDestinoLatitud; ?>, lng: <?php echo $model->PedidoDestinoLonguitud; ?>}
          <?php } ?>
        });
        document.getElementsByName("Pedido[PedidoDestinoLatitud]")[0].value = marker.getPosition().lat();
        document.getElementsByName("Pedido[PedidoDestinoLonguitud]")[0].value = marker.getPosition().lng();
        marker.addListener('dragend', actualizarposicion);
      }

      function actualizarposicion() {
          var markerLatLng = marker.getPosition();
        document.getElementsByName("Pedido[PedidoDestinoLatitud]")[0].value = markerLatLng.lat();
        document.getElementsByName("Pedido[PedidoDestinoLonguitud]")[0].value = markerLatLng.lng();
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

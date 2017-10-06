<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Envio */

$this->title = 'Update Envio: ' . $model->EnvioId;
$this->params['breadcrumbs'][] = ['label' => 'Envios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->EnvioId, 'url' => ['view', 'id' => $model->EnvioId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="envio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

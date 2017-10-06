<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Envio */

$this->title = 'Create Envio';
$this->params['breadcrumbs'][] = ['label' => 'Envios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="envio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

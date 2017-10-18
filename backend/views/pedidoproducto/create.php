<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pedidoproducto */

$this->title = 'Create Pedidoproducto';
$this->params['breadcrumbs'][] = ['label' => 'Pedidoproductos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedidoproducto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

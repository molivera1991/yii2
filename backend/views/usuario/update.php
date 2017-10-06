<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Usuario */

$this->title = 'Update Usuario: ' . $model->UsuarioId;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->UsuarioId, 'url' => ['view', 'id' => $model->UsuarioId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

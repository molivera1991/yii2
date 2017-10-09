<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Comercio */

$this->title = $model->ComercioId;
$this->params['breadcrumbs'][] = ['label' => 'Comercios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comercio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ComercioId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ComercioId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ComercioId',
            'ComercioNombre',
            'ComercioLatitud',
            'ComercioLongitud',
            //'ComercioLogo',
            [
              'attribute' => 'Comercio Logo',
              'format' => 'raw',
              'value' => function($model) {
                return Html::img($model->ComercioLogo, ['width' => 100, 'alt'=> $model->ComercioLogo ]);
              },
            ],
            //'ComercioGerente',
            [
              'attribute' => 'Comercio Gerente',
              'format' => 'raw',
              'value' => function($model) {
                return $model->getunUsuario($model->ComercioGerente)->UsuarioNombre ;
              },
            ],
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Producto */

$this->title = $model->ProductoId;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ProductoId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ProductoId], [
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
            'ProductoId',
            'ProductoNombre',
            'ProductoCodigoBarra',
            'ProductoPrecio',
            'ProductoStock',
            // 'ProductoImagen1',
            [
              'attribute' => 'Producto Imagen1',
              'format' => 'raw',
              'value' => function($model) {
                return Html::img($model->ProductoImagen1, ['width' => 150, 'alt'=> $model->ProductoNombre ]);
              },
            ],
            // 'ProductoImagen2',
            [
              'attribute' => 'Producto Imagen2',
              'format' => 'raw',
              'value' => function($model) {
                return Html::img($model->ProductoImagen2, ['width' => 150, 'alt'=> $model->ProductoNombre ]);
              },
            ],
            // 'ProductoImagen3',
            [
              'attribute' => 'Producto Imagen3',
              'format' => 'raw',
              'value' => function($model) {
                return Html::img($model->ProductoImagen3, ['width' => 150, 'alt'=> $model->ProductoNombre ]);
              },
            ],
            //'ProductoCategoria',
            [
              'attribute' => 'Producto Categoria',
              'format' => 'raw',
              'value' => function($model) {
                return $model->getunCategoria($model->ProductoCategoria)->CategoriaNombre ;
              },
            ],
            //'ProductoComercio',
            [
              'attribute' => 'Producto Comercio',
              'format' => 'raw',
              'value' => function($model) {
                return $model->getunComercio($model->ProductoComercio)->ComercioNombre ;
              },
            ],
        ],
    ]) ?>

</div>

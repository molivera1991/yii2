<?php

namespace backend\controllers;

use Yii;
use common\models\Pedidoproducto;
use backend\models\PedidoproductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PedidoproductoController implements the CRUD actions for Pedidoproducto model.
 */
class PedidoproductoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pedidoproducto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PedidoproductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pedidoproducto model.
     * @param integer $PedidoId
     * @param integer $ProductoId
     * @return mixed
     */
    public function actionView($PedidoId, $ProductoId)
    {
        return $this->render('view', [
            'model' => $this->findModel($PedidoId, $ProductoId),
        ]);
    }

    /**
     * Creates a new Pedidoproducto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pedidoproducto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'PedidoId' => $model->PedidoId, 'ProductoId' => $model->ProductoId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pedidoproducto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $PedidoId
     * @param integer $ProductoId
     * @return mixed
     */
    public function actionUpdate($PedidoId, $ProductoId)
    {
        $model = $this->findModel($PedidoId, $ProductoId);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'PedidoId' => $model->PedidoId, 'ProductoId' => $model->ProductoId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pedidoproducto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $PedidoId
     * @param integer $ProductoId
     * @return mixed
     */
    public function actionDelete($PedidoId, $ProductoId)
    {
        $this->findModel($PedidoId, $ProductoId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pedidoproducto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $PedidoId
     * @param integer $ProductoId
     * @return Pedidoproducto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($PedidoId, $ProductoId)
    {
        if (($model = Pedidoproducto::findOne(['PedidoId' => $PedidoId, 'ProductoId' => $ProductoId])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

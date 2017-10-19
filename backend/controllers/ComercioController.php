<?php

namespace backend\controllers;

use Yii;
use common\models\Comercio;
use backend\models\ComercioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ComercioController implements the CRUD actions for Comercio model.
 */
class ComercioController extends Controller
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
     * Lists all Comercio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ComercioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comercio model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Comercio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Comercio();

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post()) ) {

        //subir imagen al file system
        $model->file = UploadedFile::getInstance($model, 'file');

        if(is_null($model->file)){
          //si es nulo seteo imagen no tiene imagen.
            $model->ComercioLogo = 'uploads/sinimagen.jpg';
        }else{
          //si no es null se adjunto archivo.
          $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
          $model->ComercioLogo = 'uploads/' . $model->file->baseName . '.' . $model->file->extension;
        }

        $model->save();

            return $this->redirect(['view', 'id' => $model->ComercioId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Comercio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'file');

            if(!is_null($model->file)){
              //si no es null, adjunto nuevo archivo.
              $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
              $model->ComercioLogo = 'uploads/' . $model->file->baseName . '.' . $model->file->extension;
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->ComercioId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Comercio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        //borrar en el folder, solo si es una imagen personalizada
        if($this->findModel($id)->ComercioLogo != 'uploads/sinimagen.jpg'){
          unlink($this->findModel($id)->ComercioLogo);
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Comercio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comercio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comercio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

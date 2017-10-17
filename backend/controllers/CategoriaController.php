<?php

namespace backend\controllers;

use Yii;
use common\models\Categoria;
use backend\models\CategoriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CategoriaController implements the CRUD actions for Categoria model.
 */
class CategoriaController extends Controller
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
     * Lists all Categoria models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categoria model.
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
     * Creates a new Categoria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categoria();

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post()) ) {
          //subir imagen al file system
          $model->file = UploadedFile::getInstance($model, 'file');

          // var_dump($model->file);
          // die;
          if(is_null($model->file)){
            //si es nulo seteo imagen no tiene imagen.
            $model->CategoriaImagen = 'uploads/sinimagen.jpg';
          }else{
            //si no es null se adjunto archivo.
            $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
            $model->CategoriaImagen = 'uploads/' . $model->file->baseName . '.' . $model->file->extension;
          }
          //guardo.
          $model->save();
          return $this->redirect(['view', 'id' => $model->CategoriaId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Categoria model.
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
              $model->CategoriaImagen = 'uploads/' . $model->file->baseName . '.' . $model->file->extension;
            }
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->CategoriaId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Categoria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //borrar en el folder, solo si es una imagen personalizada
        if($this->findModel($id)->CategoriaImagen != 'uploads/sinimagen.jpg'){
          unlink($this->findModel($id)->CategoriaImagen);
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categoria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categoria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categoria::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

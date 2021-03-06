<?php

namespace backend\controllers;

use Yii;
use common\models\Producto;
use backend\models\ProductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends Controller
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
     * Lists all Producto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Producto model.
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
     * Creates a new Producto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Producto();

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post()) ) {

          //subir imagen al file system
          $model->file = UploadedFile::getInstance($model, 'file');

          if(is_null($model->file)){
            //si es nulo seteo imagen no tiene imagen.
            $model->ProductoImagen1 = 'uploads/sinimagen.jpg';
          }else{
            //si no es null se adjunto archivo.
            $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
            $model->ProductoImagen1 = 'uploads/' . $model->file->baseName . '.' . $model->file->extension;
          }

          //imagen2
          $model->file2 = UploadedFile::getInstance($model, 'file2');
          if(is_null($model->file2)){
            //si es nulo seteo imagen no tiene imagen.
            $model->ProductoImagen2 = 'uploads/sinimagen.jpg';
          }else{
            $model->file2->saveAs('uploads/' . $model->file2->baseName . '.' . $model->file2->extension);
            $model->ProductoImagen2 = 'uploads/' . $model->file2->baseName . '.' . $model->file2->extension;
          }

          //imagen3
          $model->file3 = UploadedFile::getInstance($model, 'file3');
          if(is_null($model->file3)){
            //si es nulo seteo imagen no tiene imagen.
            $model->ProductoImagen3 = 'uploads/sinimagen.jpg';
          }else{
            $model->file3->saveAs('uploads/' . $model->file3->baseName . '.' . $model->file3->extension);
            $model->ProductoImagen3 = 'uploads/' . $model->file3->baseName . '.' . $model->file3->extension;
          }

          $model->save();

            return $this->redirect(['view', 'id' => $model->ProductoId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Producto model.
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
              $model->ProductoImagen1 = 'uploads/' . $model->file->baseName . '.' . $model->file->extension;
            }

            $model->file2 = Uploadedfile::getInstance($model, 'file2');

            if(!is_null($model->file2)){
              //si no es null, adjunto nuevo archivo.
              $model->file2->saveAs('uploads/' . $model->file2->baseName . '.' . $model->file2->extension);
              $model->ProductoImagen2 = 'uploads/' . $model->file2->baseName . '.' . $model->file2->extension;
            }

            $model->file3 = Uploadedfile::getInstance($model, 'file3');

            if(!is_null($model->file3)){
              //si no es null, adjunto nuevo archivo.
              $model->file3->saveAs('uploads/' . $model->file3->baseName . '.' . $model->file3->extension);
              $model->ProductoImagen3 = 'uploads/' . $model->file3->baseName . '.' . $model->file3->extension;
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->ProductoId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Producto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        //borrar en el folder, solo si es una imagen personalizada
        if($this->findModel($id)->ProductoImagen1 != 'uploads/sinimagen.jpg'){
          unlink($this->findModel($id)->ProductoImagen1);
        }
        if($this->findModel($id)->ProductoImagen2 != 'uploads/sinimagen.jpg'){
          unlink($this->findModel($id)->ProductoImagen2);
        }
        if($this->findModel($id)->ProductoImagen3 != 'uploads/sinimagen.jpg'){
          unlink($this->findModel($id)->ProductoImagen3);
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Producto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Producto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Producto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\controllers;

use Yii;
use app\models\Colaboradores;
use app\models\Contactos;
use app\models\ColaboradoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ColaboradoresController implements the CRUD actions for Colaboradores model.
 */
class ColaboradoresController extends Controller
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
     * Lists all Colaboradores models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ColaboradoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Colaboradores model.
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
     * Creates a new Colaboradores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Colaboradores();
        $contacto = new Contactos();

        if ( $model->load(Yii::$app->request->post()) && $contacto->load(Yii::$app->request->post()) ) 
        {
            $model->save();

            $contacto->id_colaborador = $model->id_colaborador;
            $contacto->save();

            return $this->redirect(['view', 'id' => $model->id_colaborador]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'contacto' => $contacto,
            ]);
        }
    }

    /**
     * Updates an existing Colaboradores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $contacto = $this->findContactos($model->id_colaborador);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_colaborador]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'contacto' => $contacto,
            ]);
        }
    }

    /**
     * Deletes an existing Colaboradores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Colaboradores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Colaboradores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Colaboradores::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findContactos($id)
    {
        if (($model = Contactos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\controllers;

use app\models\MasterAgama;
use app\models\MasterAgamaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterAgamaController implements the CRUD actions for MasterAgama model.
 */
class MasterAgamaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all MasterAgama models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MasterAgamaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MasterAgama model.
     * @param int $id_agama Id Agama
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_agama)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_agama),
        ]);
    }

    /**
     * Creates a new MasterAgama model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MasterAgama();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_agama' => $model->id_agama]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MasterAgama model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_agama Id Agama
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_agama)
    {
        $model = $this->findModel($id_agama);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_agama' => $model->id_agama]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MasterAgama model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_agama Id Agama
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_agama)
    {
        $this->findModel($id_agama)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MasterAgama model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_agama Id Agama
     * @return MasterAgama the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_agama)
    {
        if (($model = MasterAgama::findOne(['id_agama' => $id_agama])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

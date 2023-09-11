<?php

namespace app\controllers;

use app\models\MasterStatusPerkawinan;
use app\models\MasterStatusPerkawinanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterStatusPerkawinanController implements the CRUD actions for MasterStatusPerkawinan model.
 */
class MasterStatusPerkawinanController extends Controller
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
     * Lists all MasterStatusPerkawinan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MasterStatusPerkawinanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MasterStatusPerkawinan model.
     * @param int $id_status_perkawinan Id Status Perkawinan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_status_perkawinan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_status_perkawinan),
        ]);
    }

    /**
     * Creates a new MasterStatusPerkawinan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MasterStatusPerkawinan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_status_perkawinan' => $model->id_status_perkawinan]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MasterStatusPerkawinan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_status_perkawinan Id Status Perkawinan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_status_perkawinan)
    {
        $model = $this->findModel($id_status_perkawinan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_status_perkawinan' => $model->id_status_perkawinan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MasterStatusPerkawinan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_status_perkawinan Id Status Perkawinan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_status_perkawinan)
    {
        $this->findModel($id_status_perkawinan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MasterStatusPerkawinan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_status_perkawinan Id Status Perkawinan
     * @return MasterStatusPerkawinan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_status_perkawinan)
    {
        if (($model = MasterStatusPerkawinan::findOne(['id_status_perkawinan' => $id_status_perkawinan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

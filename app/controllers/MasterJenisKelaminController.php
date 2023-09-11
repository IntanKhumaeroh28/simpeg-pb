<?php

namespace app\controllers;

use app\models\MasterJenisKelamin;
use app\models\MasterJenisKelaminSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterJenisKelaminController implements the CRUD actions for MasterJenisKelamin model.
 */
class MasterJenisKelaminController extends Controller
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
     * Lists all MasterJenisKelamin models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MasterJenisKelaminSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MasterJenisKelamin model.
     * @param string $kode_jenis_kelamin Kode Jenis Kelamin
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($kode_jenis_kelamin)
    {
        return $this->render('view', [
            'model' => $this->findModel($kode_jenis_kelamin),
        ]);
    }

    /**
     * Creates a new MasterJenisKelamin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MasterJenisKelamin();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'kode_jenis_kelamin' => $model->kode_jenis_kelamin]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MasterJenisKelamin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kode_jenis_kelamin Kode Jenis Kelamin
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($kode_jenis_kelamin)
    {
        $model = $this->findModel($kode_jenis_kelamin);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_jenis_kelamin' => $model->kode_jenis_kelamin]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MasterJenisKelamin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kode_jenis_kelamin Kode Jenis Kelamin
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($kode_jenis_kelamin)
    {
        $this->findModel($kode_jenis_kelamin)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MasterJenisKelamin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kode_jenis_kelamin Kode Jenis Kelamin
     * @return MasterJenisKelamin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kode_jenis_kelamin)
    {
        if (($model = MasterJenisKelamin::findOne(['kode_jenis_kelamin' => $kode_jenis_kelamin])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

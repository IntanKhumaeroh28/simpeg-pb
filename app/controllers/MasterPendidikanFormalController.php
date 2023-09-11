<?php

namespace app\controllers;

use app\models\MasterPendidikanFormal;
use app\models\MasterPendidikanFormalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterPendidikanFormalController implements the CRUD actions for MasterPendidikanFormal model.
 */
class MasterPendidikanFormalController extends Controller
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
     * Lists all MasterPendidikanFormal models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MasterPendidikanFormalSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MasterPendidikanFormal model.
     * @param int $id_pendidikan_formal Nama Pendidikan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pendidikan_formal)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pendidikan_formal),
        ]);
    }

    /**
     * Creates a new MasterPendidikanFormal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MasterPendidikanFormal();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pendidikan_formal' => $model->id_pendidikan_formal]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MasterPendidikanFormal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pendidikan_formal Nama Pendidikan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pendidikan_formal)
    {
        $model = $this->findModel($id_pendidikan_formal);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pendidikan_formal' => $model->id_pendidikan_formal]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MasterPendidikanFormal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pendidikan_formal Nama Pendidikan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pendidikan_formal)
    {
        $this->findModel($id_pendidikan_formal)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MasterPendidikanFormal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pendidikan_formal Nama Pendidikan
     * @return MasterPendidikanFormal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pendidikan_formal)
    {
        if (($model = MasterPendidikanFormal::findOne(['id_pendidikan_formal' => $id_pendidikan_formal])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

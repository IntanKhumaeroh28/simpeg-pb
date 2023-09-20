<?php

namespace app\controllers;

use app\models\UnitKerja;
use app\models\UnitKerjaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UnitKerjaController implements the CRUD actions for UnitKerja model.
 */
class UnitKerjaController extends Controller
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
                'ghost-access' => [
                    'class' => 'app\components\GhostAccessControl',
                ],
            ]
        );
    }

    /**
     * Lists all UnitKerja models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UnitKerjaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UnitKerja model.
     * @param string $kode_unit Kode Unit
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($kode_unit)
    {
        return $this->render('view', [
            'model' => $this->findModel($kode_unit),
        ]);
    }

    /**
     * Creates a new UnitKerja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UnitKerja();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'kode_unit' => $model->kode_unit]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UnitKerja model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kode_unit Kode Unit
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($kode_unit)
    {
        $model = $this->findModel($kode_unit);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_unit' => $model->kode_unit]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UnitKerja model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kode_unit Kode Unit
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($kode_unit)
    {
        $this->findModel($kode_unit)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UnitKerja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kode_unit Kode Unit
     * @return UnitKerja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kode_unit)
    {
        if (($model = UnitKerja::findOne(['kode_unit' => $kode_unit])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

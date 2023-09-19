<?php

namespace app\controllers;

use app\models\MasterHubunganKeluarga;
use app\models\MasterHubunganKeluargaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterHubunganKeluargaController implements the CRUD actions for MasterHubunganKeluarga model.
 */
class MasterHubunganKeluargaController extends Controller
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
     * Lists all MasterHubunganKeluarga models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MasterHubunganKeluargaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MasterHubunganKeluarga model.
     * @param int $id_hubungan_keluarga Id Hubungan Keluarga
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_hubungan_keluarga)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_hubungan_keluarga),
        ]);
    }

    /**
     * Creates a new MasterHubunganKeluarga model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MasterHubunganKeluarga();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_hubungan_keluarga' => $model->id_hubungan_keluarga]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MasterHubunganKeluarga model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_hubungan_keluarga Id Hubungan Keluarga
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_hubungan_keluarga)
    {
        $model = $this->findModel($id_hubungan_keluarga);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_hubungan_keluarga' => $model->id_hubungan_keluarga]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MasterHubunganKeluarga model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_hubungan_keluarga Id Hubungan Keluarga
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_hubungan_keluarga)
    {
        $this->findModel($id_hubungan_keluarga)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MasterHubunganKeluarga model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_hubungan_keluarga Id Hubungan Keluarga
     * @return MasterHubunganKeluarga the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_hubungan_keluarga)
    {
        if (($model = MasterHubunganKeluarga::findOne(['id_hubungan_keluarga' => $id_hubungan_keluarga])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

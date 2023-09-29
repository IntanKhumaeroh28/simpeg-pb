<?php

namespace app\controllers;

use app\models\RiwayatKeluarga;
use app\models\RiwayatKeluargaSearch;
use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RiwayatKeluargaController implements the CRUD actions for RiwayatKeluarga model.
 */
class RiwayatKeluargaController extends Controller
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
     * Lists all RiwayatKeluarga models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RiwayatKeluargaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RiwayatKeluarga model.
     * @param int $id_riwayat_keluarga Id Riwayat Keluarga
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_riwayat_keluarga)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_riwayat_keluarga),
        ]);
    }

    /**
     * Creates a new RiwayatKeluarga model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RiwayatKeluarga();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->save();
                echo '<pre>';
                print_r($model->getErrorSummary(true));
                echo '</pre>';
                die;

                return $this->redirect(['view', 'id_riwayat_keluarga' => $model->id_riwayat_keluarga]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RiwayatKeluarga model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_riwayat_keluarga Id Riwayat Keluarga
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_riwayat_keluarga)
    {
        if (User::hasRole('pegawai', false)) {
            $id_pegawai = Yii::$app->user->identity->username;
        }
        $model = $this->findModel($id_riwayat_keluarga);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_riwayat_keluarga' => $model->id_riwayat_keluarga]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RiwayatKeluarga model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_riwayat_keluarga Id Riwayat Keluarga
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_riwayat_keluarga)
    {
        $this->findModel($id_riwayat_keluarga)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RiwayatKeluarga model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_riwayat_keluarga Id Riwayat Keluarga
     * @return RiwayatKeluarga the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_riwayat_keluarga)
    {
        if (User::hasRole('pegawai', false)) {
            $id_pegawai = Yii::$app->user->identity->username;
            if (($model = RiwayatKeluarga::findOne(['id_riwayat_keluarga' => $id_riwayat_keluarga, 'id_pegawai' => $id_pegawai])) !== null) {
                return $model;
            }
        } else {
            if (($model = RiwayatKeluarga::findOne(['id_riwayat_keluarga' => $id_riwayat_keluarga])) !== null) {
                return $model;
            }
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

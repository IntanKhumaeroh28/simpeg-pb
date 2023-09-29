<?php

namespace app\controllers;

use app\models\RiwayatPendidikan;
use app\models\RiwayatPendidikanSearch;
use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RiwayatPendidikanController implements the CRUD actions for RiwayatPendidikan model.
 */
class RiwayatPendidikanController extends Controller
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
     * Lists all RiwayatPendidikan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RiwayatPendidikanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RiwayatPendidikan model.
     * @param int $id_riwayat_pendidikan Id Riwayat Pendidikan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_riwayat_pendidikan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_riwayat_pendidikan),
        ]);
    }

    /**
     * Creates a new RiwayatPendidikan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RiwayatPendidikan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->save();
                return $this->redirect(['view', 'id_riwayat_pendidikan' => $model->id_riwayat_pendidikan]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RiwayatPendidikan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_riwayat_pendidikan Id Riwayat Pendidikan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_riwayat_pendidikan)
    {
        $model = $this->findModel($id_riwayat_pendidikan);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->save();
            // echo '<pre>';
            // print_r($model->getErrorSummary(true));
            // echo '</pre>';
            // die;

            return $this->redirect(['view', 'id_riwayat_pendidikan' => $model->id_riwayat_pendidikan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RiwayatPendidikan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_riwayat_pendidikan Id Riwayat Pendidikan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_riwayat_pendidikan)
    {
        $this->findModel($id_riwayat_pendidikan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RiwayatPendidikan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_riwayat_pendidikan Id Riwayat Pendidikan
     * @return RiwayatPendidikan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_riwayat_pendidikan)
    {
        if (User::hasRole('pegawai', false)) {
            $id_pegawai = Yii::$app->user->identity->username;
            if (($model = RiwayatPendidikan::findOne(['id_riwayat_pendidikan' => $id_riwayat_pendidikan, 'id_pegawai' => $id_pegawai])) !== null) {
                return $model;
            }
        } else {
            if (($model = RiwayatPendidikan::findOne(['id_riwayat_pendidikan' => $id_riwayat_pendidikan])) !== null) {
                return $model;
            }
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

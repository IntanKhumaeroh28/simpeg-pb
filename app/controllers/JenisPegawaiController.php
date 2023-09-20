<?php

namespace app\controllers;

use app\models\JenisPegawai;
use app\models\JenisPegawaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JenisPegawaiController implements the CRUD actions for JenisPegawai model.
 */
class JenisPegawaiController extends Controller
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
     * Lists all JenisPegawai models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new JenisPegawaiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JenisPegawai model.
     * @param string $kode_jenis_pegawai Kode Jenis Pegawai
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($kode_jenis_pegawai)
    {
        return $this->render('view', [
            'model' => $this->findModel($kode_jenis_pegawai),
        ]);
    }

    /**
     * Creates a new JenisPegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new JenisPegawai();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'kode_jenis_pegawai' => $model->kode_jenis_pegawai]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JenisPegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kode_jenis_pegawai Kode Jenis Pegawai
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($kode_jenis_pegawai)
    {
        $model = $this->findModel($kode_jenis_pegawai);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_jenis_pegawai' => $model->kode_jenis_pegawai]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JenisPegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kode_jenis_pegawai Kode Jenis Pegawai
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($kode_jenis_pegawai)
    {
        $this->findModel($kode_jenis_pegawai)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JenisPegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kode_jenis_pegawai Kode Jenis Pegawai
     * @return JenisPegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kode_jenis_pegawai)
    {
        if (($model = JenisPegawai::findOne(['kode_jenis_pegawai' => $kode_jenis_pegawai])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

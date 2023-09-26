<?php

namespace app\controllers;

use app\models\BiodataPegawai;
use app\models\BiodataPegawaiSearch;
use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BiodataPegawaiController implements the CRUD actions for BiodataPegawai model.
 */
class BiodataPegawaiController extends Controller
{

    // public function behaviors()
    // {
    //     return [
    //         'ghost-access' => [
    //             'class' => 'app\components\GhostAccessControl',
    //         ],
    //     ];
    // }
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
     * Lists all BiodataPegawai models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (User::hasRole('pegawai', false)) {
            $id_pegawai = Yii::$app->user->identity->username;

            $sql = "SELECT * FROM riwayat_pendidikan 
                INNER JOIN master_pendidikan_formal ON master_pendidikan_formal.id_pendidikan_formal = riwayat_pendidikan.id_pendidikan_formal
                WHERE riwayat_pendidikan.id_pegawai = '$id_pegawai'";

            $data_riwayat_pendidikan = Yii::$app->db->createCommand($sql)->queryAll();

            $sql = "SELECT * FROM riwayat_keluarga
                INNER JOIN master_hubungan_keluarga ON master_hubungan_keluarga.id_hubungan_keluarga = riwayat_keluarga.id_hubungan_keluarga
                WHERE riwayat_keluarga.id_pegawai = '$id_pegawai'";

            $data_riwayat_keluarga = Yii::$app->db->createCommand($sql)->queryAll();

            return $this->render('view', [
                'model' => $this->findModel($id_pegawai),
                'data_riwayat_pendidikan' => $data_riwayat_pendidikan,
                'data_riwayat_keluarga' => $data_riwayat_keluarga
            ]);
        } else {
            $searchModel = new BiodataPegawaiSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single BiodataPegawai model.
     * 
     * @param string $id_pegawai Id Pegawai
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pegawai)
    {
        $id_pegawai = $_GET['id_pegawai'];

        $sql = "SELECT * FROM riwayat_pendidikan 
        INNER JOIN master_pendidikan_formal ON master_pendidikan_formal.id_pendidikan_formal = riwayat_pendidikan.id_pendidikan_formal
        WHERE riwayat_pendidikan.id_pegawai = '$id_pegawai'";

        $data_riwayat_pendidikan = Yii::$app->db->createCommand($sql)->queryAll();

        $sql = "SELECT * FROM riwayat_keluarga
        INNER JOIN master_hubungan_keluarga ON master_hubungan_keluarga.id_hubungan_keluarga = riwayat_keluarga.id_hubungan_keluarga
        WHERE riwayat_keluarga.id_pegawai = '$id_pegawai'";

        $data_riwayat_keluarga = Yii::$app->db->createCommand($sql)->queryAll();

        return $this->render('view', [
            'model' => $this->findModel($id_pegawai),
            'data_riwayat_pendidikan' => $data_riwayat_pendidikan,
            'data_riwayat_keluarga' => $data_riwayat_keluarga
        ]);
    }

    /**
     * Creates a new BiodataPegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new BiodataPegawai();

        if ($this->request->isPost) {
            // kalo error ga akan tampil halaman view
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pegawai' => $model->id_pegawai]);
            }
        } else {
            $model->loadDefaultValues();
        }

        // ketika login input data akan render halaman create
        // dan ketika gagal akan render halaman create juga
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BiodataPegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_pegawai Id Pegawai
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pegawai)
    {
        $model = $this->findModel($id_pegawai);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pegawai' => $model->id_pegawai]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BiodataPegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_pegawai Id Pegawai
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pegawai)
    {
        $this->findModel($id_pegawai)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BiodataPegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_pegawai Id Pegawai
     * @return BiodataPegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pegawai)
    {
        if (($model = BiodataPegawai::findOne(['id_pegawai' => $id_pegawai])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

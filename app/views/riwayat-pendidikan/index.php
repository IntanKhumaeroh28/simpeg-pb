<?php

use app\models\BiodataPegawai;
use app\models\RiwayatPendidikan;
use app\models\User;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\base\Model;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\RiwayatPendidikanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Riwayat Pendidikan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-pendidikan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= GhostHtml::a('Entri Riwayat Pendidikan', ['riwayat-pendidikan/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_riwayat_pendidikan',
            [
                // 'attribute' => 'id_pegawai',
                // 'filter' => ArrayHelper::map(BiodataPegawai::find()->asArray()->all(), 'id_pegawai', 'nama'),
                // 'value' => function ($model) {
                //     return $model->biodataPegawai->nama;
                // }
                'attribute' => 'id_pegawai',
                'filter' => User::hasRole('pegawai', false) ? null : ArrayHelper::map(BiodataPegawai::find()->asArray()->all(), 'id_pegawai', 'nama'),
                'value' => function ($model) {
                    return $model->biodataPegawai->nama;
                }
            ],
            'asal_sekolah',
            // 'prodi',
            // 'gelar',
            'tahun_tamat',

            [
                'attribute' => 'dokumen',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->dokumen;
                    // return Html::ijazah_file(Yii::getAlias('@web/files/images/dokumen') . $model->dokumen, ['height' => '80px']);
                }

            ],
            [
                'attribute' => 'id_pendidikan_formal',
                'value' => function ($model) {
                    return $model->pendidikanFormal->nama_pendidikan;
                }
            ],

            [
                'class' => ActionColumn::className(),
                'template' => '{view} {edit} {hapus}',
                'contentOptions' => ['style' => 'width:25%;'],
                'buttons' => [
                    'view' => function ($url, $model) {
                        return GhostHtml::a('View', ['riwayat-pendidikan/view', 'id_riwayat_pendidikan' => $model['id_riwayat_pendidikan']], [
                            'class' => 'btn btn-primary btn-sm'
                        ]);
                    },
                    'edit' => function ($url, $model) {
                        return GhostHtml::a('Edit', ['riwayat-pendidikan/update', 'id_riwayat_pendidikan' => $model['id_riwayat_pendidikan']], [
                            'class' => 'btn btn-warning btn-sm'
                        ]);
                    },
                    'hapus' => function ($url, $model) {
                        return GhostHtml::a('Delete', ['riwayat-pendidikan/delete', 'id_riwayat_pendidikan' => $model['id_riwayat_pendidikan']], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
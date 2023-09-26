<?php

use app\models\RiwayatKeluarga;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RiwayatKeluargaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Riwayat Keluarga';
$this->params['breadcrumbs'][] = $this->title;

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}


?>
<div class="riwayat-keluarga-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= GhostHtml::a('Entri Riwayat Keluarga', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_riwayat_keluarga',
            'nama',
            //'hub_keluarga',
            'nik',
            // 'file_kk',
            // 'file_akte',
            [
                'attribute' => 'tgl_lahir',
                'value' => function ($model) {
                    return tgl_indo($model->tgl_lahir);
                }
            ],
            // 'id_pegawai',
            // 'id_hubungan_keluarga',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, RiwayatKeluarga $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id_riwayat_keluarga' => $model->id_riwayat_keluarga]);
            //     }
            // ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {edit} {hapus}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return GhostHtml::a('View', ['jenis-pegawai/view', 'kode_jenis_pegawai' => $model['kode_jenis_pegawai']], [
                            'class' => 'btn btn-primary btn-sm'
                        ]);
                    },
                    'edit' => function ($url, $model) {
                        return GhostHtml::a('Edit', ['jenis-pegawai/update', 'kode_jenis_pegawai' => $model['kode_jenis_pegawai']], [
                            'class' => 'btn btn-warning btn-sm'
                        ]);
                    },
                    'hapus' => function ($url, $model) {
                        return GhostHtml::a('Delete', ['jenis-pegawai/delete', 'kode_jenis_pegawai' => $model['kode_jenis_pegawai']], [
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
<?php

use app\models\BiodataPegawai;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BiodataPegawaiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Biodata Pegawai';
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
<div class="biodata-pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= GhostHtml::a('Entri Biodata Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pegawai',
            'nik',
            'nama',
            [
                'attribute' => 'tgl_lahir',
                'value' => function ($model) {
                    return tgl_indo($model->tgl_lahir);
                }
            ],
            'tempat_lahir',
            // 'alamat',
            // 'no_telp',
            // 'email:email',
            // 'foto',
            // 'jumlah_pasangan',
            // 'jumlah_anak',
            // 'tahun_masuk',
            // 'kode_jenis_kelamin',
            // 'kode_jenis_pegawai',
            // 'kode_unit',
            // 'id_agama',
            // 'id_status_perkawinan',
            // 'username',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, BiodataPegawai $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id_pegawai' => $model->id_pegawai]);
            //     }
            // ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {edit} {hapus}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return GhostHtml::a('View', ['biodata-pegawai/view', 'id_pegawai' => $model['id_pegawai']], [
                            'class' => 'btn btn-primary btn-sm'
                        ]);
                    },
                    'edit' => function ($url, $model) {
                        return GhostHtml::a('Edit', ['biodata-pegawai/update', 'id_pegawai' => $model['id_pegawai']], [
                            'class' => 'btn btn-warning btn-sm'
                        ]);
                    },
                    'hapus' => function ($url, $model) {
                        return GhostHtml::a('Delete', ['biodata-pegawai/delete', 'id_pegawai' => $model->id_pegawai], [
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
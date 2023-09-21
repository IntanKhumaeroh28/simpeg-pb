<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\RiwayatKeluarga $model */

$this->title = $model->id_riwayat_keluarga;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

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
<div class="riwayat-keluarga-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_riwayat_keluarga' => $model->id_riwayat_keluarga], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_riwayat_keluarga' => $model->id_riwayat_keluarga], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_riwayat_keluarga',
            'nama',
            // 'hub_keluarga',
            'nik',
            'file_kk',
            [
                'attribute' => 'file_kk',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::img(Yii::getAlias('@web/files/dokumen/') . $model->file_kk, ['height' => '200px']);
                }
            ],
            'file_akte',
            [
                'attribute' => 'tgl_lahir',
                'value' => function ($model) {
                    return tgl_indo($model->tgl_lahir);
                }
            ],
            //'id_pegawai',
            [
                'attribute' => 'id_hubungan_keluarga',
                'label' => 'Hubungan Keluarga',
                'value' => function ($model) {
                    return $model->masterHubunganKeluarga->hubungan_keluarga;
                }
            ],
        ],
    ]) ?>

</div>
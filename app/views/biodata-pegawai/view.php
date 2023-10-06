<?php

use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\BiodataPegawai $model */

$this->title = $model->id_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Biodata Pegawai', 'url' => ['index']];
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
<div class="biodata-pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <?= GhostHtml::a('Update', ['biodata-pegawai/update', 'id_pegawai' => $model->id_pegawai], ['class' => 'btn btn-primary']) ?>
        <?= GhostHtml::a('Delete', ['biodata-pegawai/delete', 'id_pegawai' => $model->id_pegawai], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>

    <div class="row">
        <div class="col">
            <h2>Foto Pegawai</p>
                <img src='<?= Yii::getAlias('@web/files/img/') . $model->foto ?>' width="100%">
        </div>
        <div class="col-md-12">
            <?= DetailView::widget([

                'model' => $model,
                'attributes' => [
                    // 'id_pegawai',
                    'nik',
                    'nama',
                    [
                        'attribute' => 'tgl_lahir',
                        'value' => function ($model) {
                            return tgl_indo($model->tgl_lahir);
                        }
                    ],
                    'tempat_lahir',
                    'alamat',
                    'no_telp',
                    'email:email',
                    // 'foto',
                    // [
                    //     'attribute' => 'foto',
                    //     'format' => 'raw',
                    //     'value' => function ($model) {
                    //         return Html::img(Yii::getAlias('@web/files/img/') . $model->foto, ['height' => '200px']);
                    //     }
                    // ],
                    'jumlah_pasangan',
                    'jumlah_anak',
                    'tahun_masuk',
                    [
                        'attribute' => 'kode_jenis_kelamin',
                        'label' => 'Jenis Kelamin',
                        'value' => function ($model) {
                            return $model->kodeJenisKelamin->jenis_kelamin;
                        }
                    ],
                    [
                        'attribute' => 'kode_jenis_pegawai',
                        'label' => 'Jenis Pegawai',
                        'value' => function ($model) {
                            return $model->kodeJenisPegawai->nama_jenis_pegawai;
                        }
                    ],
                    [
                        'attribute' => 'kode_unit',
                        'label' => 'Unit',
                        'value' => function ($model) {
                            return $model->kodeUnit->nama_unit;
                        }
                    ],
                    [
                        'attribute' => 'id_agama',
                        'label' => 'Agama',
                        'value' => function ($model) {
                            return $model->agama->agama;
                        }
                    ],
                    'statusPerkawinan.status_perkawinan',

                    // 'created_at',
                    // 'updated_at',
                    // 'created_by',
                    // 'updated_by',

                ],
            ]) ?>
        </div>
    </div>
</div>

<br>
<h3>RIWAYAT PENDIDIKAN</h3>
<table class="table table-hover">
    <thead>
        <tr class="table-primary">
            <th scope="col">No</th>
            <th scope="col">Nama Pendidikan</th>
            <th scope="col">Tahun Tamat</th>
            <th scope="col">Dokumen</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data_riwayat_pendidikan as $value) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['nama_pendidikan'] ?></td>
                <td><?= $value['tahun_tamat'] ?></td>
                <td><?= Html::a($value['dokumen'], ['biodata-pegawai/view-dokumen', 'dokumen' => $value['dokumen']]) ?></td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>
<br>
<h3>RIWAYAT KELUARGA</h3>
<table class="table table-hover">
    <thead>
        <tr class="table-primary">
            <th scope="col">No</th>
            <th scope="col">Hubungan Keluarga</th>
            <th scope="col">Nama</th>
            <th scope="col">Tgl Lahir</th>
            <th scope="col">Nik</th>
            <th scope="col">File KK</th>
            <th scope="col">File Akte</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data_riwayat_keluarga as $value) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['hubungan_keluarga'] ?></td>
                <td><?= $value['nama'] ?></td>
                <td><?= tgl_indo($value['tgl_lahir']) ?></td>
                <td><?= $value['nik'] ?></td>
                <td><?= Html::a($value['file_kk'], ['biodata-pegawai/view-dokumen', 'dokumen' => $value['file_kk']]) ?></td>
                <td><?= Html::a($value['file_akte'], ['biodata-pegawai/view-dokumen', 'dokumen' => $value['file_akte']]) ?></td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>
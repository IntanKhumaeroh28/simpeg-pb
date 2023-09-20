<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\BiodataPegawai $model */

$this->title = $model->id_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Biodata Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="biodata-pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_pegawai' => $model->id_pegawai], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_pegawai' => $model->id_pegawai], [
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
            'id_pegawai',
            'nik',
            'nama',
            'tgl_lahir',
            'tempat_lahir',
            'alamat',
            'no_telp',
            'email:email',
            // 'foto',
            [
                'attribute' => 'foto',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::img(Yii::getAlias('@web/image/') . $model->foto, ['height' => '200px']);
                }
            ],
            'jumlah_pasangan',
            'jumlah_anak',
            'tahun_masuk',
            'kode_jenis_kelamin',
            'kode_jenis_pegawai',
            'kode_unit',
            'id_agama',
            'id_status_perkawinan',
            'username',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

        ],
    ]) ?>
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
                <td><?= $value['dokumen'] ?></td>
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
                <td><?= $value['tgl_lahir'] ?></td>
                <td><?= $value['nik'] ?></td>
                <td><?= $value['file_kk'] ?></td>
                <td><?= $value['file_akte'] ?></td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>
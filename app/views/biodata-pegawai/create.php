<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BiodataPegawai $model */

$this->title = 'Entri Biodata Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Biodata Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biodata-pegawai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <!-- <form action="" method="POST">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
        <div class="mb-3">
            <label class="form-label">Id Pegawai</label>
            <input type="text" class="form-control" name="id_pegawai">
        </div>
        <div class="mb-3">
            <label class="form-label">Nik</label>
            <input type="text" class="form-control" name="nik">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama">
        </div>
        <div class="mb-3">
            <label class="form-label">Tgl Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir">
        </div>
        <div class="mb-3">
            <label class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir">
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat">
        </div>
        <div class="mb-3">
            <label class="form-label">No Telp</label>
            <input type="text" class="form-control" name="no_telp">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="text" class="form-control" name="foto">
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah Pasangan</label>
            <input type="text" class="form-control" name="jumlah_pasangan">
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah Anak</label>
            <input type="text" class="form-control" name="jumlah_anak">
        </div>
        <div class="mb-3">
            <label class="form-label">Tahun Masuk</label>
            <input type="text" class="form-control" name="tahun_masuk">
        </div>
        <div class="mb-3">
            <label class="form-label">Kode Jenis Kelamin</label>
            <input type="text" class="form-control" name="kode_jenis_kelamin">
        </div>
        <div class="mb-3">
            <label class="form-label">Kode Jenis Pegawai</label>
            <input type="text" class="form-control" name="kode_jenis_pegawai">
        </div>
        <div class="mb-3">
            <label class="form-label">Kode Unit</label>
            <input type="text" class="form-control" name="kode_unit">
        </div>
        <div class="mb-3">
            <label class="form-label">Id Agama</label>
            <input type="text" class="form-control" name="id_agama">
        </div>
        <div class="mb-3">
            <label class="form-label">Id Status Perkawinan</label>
            <input type="text" class="form-control" name="id_status_perkawinan">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form> -->

</div>
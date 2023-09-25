<?php

/** @var yii\web\View $this */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Sistem Informasi Kepegawaian Prabubima Tech';
?>
<style>
    /* body {
        background-color: #006A4E;
    } */

    h1 {
        font-size: 35px;
        color: black;
        font-family: Apple Chancery;
    }


    .box {
        width: 120px;
        height: 155px;
        display: block;
        color: white;
        /* border: 1px solid black; */
        padding: 10px;
        margin: 10px;
        background-color: #006A4E;
        border-radius: 12px;
        text-align: center;
    }

    .box:hover {
        text-decoration: none;
        color: whitesmoke;
        box-shadow: 0 0 16px rgba(35, 173, 278, 1);
    }

    .box-center {
        text-align: center;
        margin-bottom: 6px;

    }
</style>
<div class="site-index">
    <div class="container-custom">
        <div class="row mt-3">
            <div class="col d-flex justify-content-center">
                <h1>Sistem Informasi Kepegawaian Prabubima Tech</h1>

            </div>
        </div>
        <div class="row mt-2">
            <div class="col" style="text-align: center;">
                <img src="https://prabubimatech.com/assets/image/logo.png" style="height: 200px;">
                <div class="row justify-content-center">

                    <a class="box" href="<?= Url::to(['biodata-pegawai/index']) ?>">
                        <div class="box-center">
                            <?php echo Html::img('app/assets/icon/biodata.png', ['class' => 'pull-left img-responsive']); ?>
                        </div>
                        <span>Biodata Pegawai</span>
                    </a>
                    <a class="box" href="<?= Url::to(['riwayat-keluarga/index']) ?>">
                        <div class="box-center">
                            <?php echo Html::img('app/assets/icon/family.png', ['class' => 'pull-left img-responsive']); ?>
                        </div>
                        <span>Riwayat Keluarga</span>
                    </a>
                    <a class="box" href="<?= Url::to(['master-hubungan-keluarga/index']) ?>">
                        <div class="box-center">
                            <?php echo Html::img('app/assets/icon/masterhub.png', ['class' => 'pull-left img-responsive']); ?>
                        </div>
                        <span>Master Hubungan Keluarga</span>
                    </a>
                    <a class="box" href="<?= Url::to(['riwayat-pendidikan/index']) ?>">
                        <div class="box-center">
                            <?php echo Html::img('app/assets/icon/riwayatpend.png', ['class' => 'pull-left img-responsive']); ?>
                        </div>
                        <span>Riwayat Pendidikan</span>
                    </a>
                    <a class="box" href="<?= Url::to(['master-pendidikan-formal/index']) ?>">
                        <div class="box-center">
                            <?php echo Html::img('app/assets/icon/masterpend.png', ['class' => 'pull-left img-responsive']); ?>
                        </div>
                        <span>Master Pendidikan Formal</span>
                    </a>
                    <a class="box" href="<?= Url::to(['master-jenis-kelamin/index']) ?>">
                        <div class="box-center">
                            <?php echo Html::img('app/assets/icon/jenis kelamin.png', ['class' => 'pull-left img-responsive']); ?>
                        </div>
                        <span>Master Jenis Kelamin</span>
                    </a>
                    <a class="box" href="<?= Url::to(['master-agama/index']) ?>">
                        <div class="box-center">
                            <?php echo Html::img('app/assets/icon/agama.png', ['class' => 'pull-left img-responsive']); ?>
                        </div>
                        <span>Master Agama</span>
                    </a>
                    <a class="box" href="<?= Url::to(['master-status-perkawinan/index']) ?>">
                        <div class="box-center">
                            <?php echo Html::img('app/assets/icon/status perkawinan.png', ['class' => 'pull-left img-responsive']); ?>
                        </div>
                        <span>Master Status Perkawinan</span>
                    </a>
                    <a class="box" href="<?= Url::to(['jenis-pegawai/index']) ?>">
                        <div class="box-center">
                            <?php echo Html::img('app/assets/icon/jenis pegawai.png', ['class' => 'pull-left img-responsive']); ?>
                        </div>
                        <span>Jenis Pegawai</span>
                    </a>
                    <a class="box" href="<?= Url::to(['unit-kerja/index']) ?>">
                        <div class="box-center">
                            <?php echo Html::img('app/assets/icon/unit kerja.png', ['class' => 'pull-left img-responsive']); ?>
                        </div>
                        <span>Unit Kerja</span>
                    </a>
                    <a class="box" href="<?= Url::to(['laporan/rekap_per_jenis_kelamin_pegawai']) ?>">
                        <div class="box-center">
                            <?php echo Html::img('app/assets/icon/rekap.png', ['class' => 'pull-left img-responsive']); ?>
                        </div>
                        <span>Rekap Jenis Kelamin dan Pegawai</span>
                    </a>
                    <a class="box" href="<?= Url::to(['laporan/rekap_per_nama_unit_jenis_kelamin_total']) ?>">
                        <div class="box-center">
                            <?php echo Html::img('app/assets/icon/rekap.png', ['class' => 'pull-left img-responsive']); ?>
                        </div>
                        <span>Rekap Nama Unit, Jenis Kelamin dan Total</span>
                    </a>
                    <a class="box" href="<?= Url::to(['laporan/rekap_per_nama_unit_pegawai']) ?>">
                        <div class="box-center">
                            <?php echo Html::img('app/assets/icon/rekap.png', ['class' => 'pull-left img-responsive']); ?>
                        </div>
                        <span>Rekap Nama Unit, Jumlah Pegawai</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
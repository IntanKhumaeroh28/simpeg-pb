<?php

/** @var yii\web\View $this */

use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Sistem Informasi Kepegawaian Prabubima Tech';
// $this->registerCss("
//     body {
//       background-image: url('assets/image.jpg');
//       background-repeat: no-repeat;
//       background-size: auto;
//     }
// ");
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
        height: 177 px;
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
                    <?php echo GhostHtml::a(
                        Html::tag('div', Html::img('app/assets/icon/biodata.png', ['class' => 'pull-left img-responsive']), ['class' => 'box-center']) . Html::tag('span', 'Biodata Pegawai'),
                        ['biodata-pegawai/index'],
                        ['class' => 'box']
                    ) ?>
                    <?php echo GhostHtml::a(
                        Html::tag('div', Html::img('app/assets/icon/family.png', ['class' => 'pull-left img-responsive']), ['class' => 'box-center']) . Html::tag('span', 'Riwayat Keluarga'),
                        ['riwayat-keluarga/index'],
                        ['class' => 'box']
                    ) ?>
                    <?php echo GhostHtml::a(
                        Html::tag('div', Html::img('app/assets/icon/riwayatpend.png', ['class' => 'pull-left img-responsive']), ['class' => 'box-center']) . Html::tag('span', 'Riwayat Pendidikan'),
                        ['riwayat-pendidikan/index'],
                        ['class' => 'box']
                    ) ?>
                    <?php echo GhostHtml::a(
                        Html::tag('div', Html::img('app/assets/icon/masterhub.png', ['class' => 'pull-left img-responsive']), ['class' => 'box-center']) . Html::tag('span', 'Master Hubungan Keluarga'),
                        ['master-hubungan-keluarga/index'],
                        ['class' => 'box']
                    ) ?>
                    <?php echo GhostHtml::a(
                        Html::tag('div', Html::img('app/assets/icon/masterpend.png', ['class' => 'pull-left img-responsive']), ['class' => 'box-center']) . Html::tag('span', 'Master Hubungan Pendidikan Formal'),
                        ['master-pendidikan-formal/index'],
                        ['class' => 'box']
                    ) ?>
                    <?php echo GhostHtml::a(
                        Html::tag('div', Html::img('app/assets/icon/jenis kelamin.png', ['class' => 'pull-left img-responsive']), ['class' => 'box-center']) . Html::tag('span', 'Master Jenis Kelamin'),
                        ['master-jenis-kelamin/index'],
                        ['class' => 'box']
                    ) ?>
                    <?php echo GhostHtml::a(
                        Html::tag('div', Html::img('app/assets/icon/agama.png', ['class' => 'pull-left img-responsive']), ['class' => 'box-center']) . Html::tag('span', 'Master Agama'),
                        ['master-agama/index'],
                        ['class' => 'box']
                    ) ?>

                    <?php echo GhostHtml::a(
                        Html::tag('div', Html::img('app/assets/icon/status perkawinan.png', ['class' => 'pull-left img-responsive']), ['class' => 'box-center']) . Html::tag('span', 'Master Status Perkawinan'),
                        ['master-status-perkawinan/index'],
                        ['class' => 'box']
                    ) ?>
                    <?php echo GhostHtml::a(
                        Html::tag('div', Html::img('app/assets/icon/jenis pegawai.png', ['class' => 'pull-left img-responsive']), ['class' => 'box-center']) . Html::tag('span', 'Jenis Pegawai'),
                        ['jenis-pegawai/index'],
                        ['class' => 'box']
                    ) ?>
                    <?php echo GhostHtml::a(
                        Html::tag('div', Html::img('app/assets/icon/unit kerja.png', ['class' => 'pull-left img-responsive']), ['class' => 'box-center']) . Html::tag('span', 'Unit Kerja'),
                        ['unit-kerja/index'],
                        ['class' => 'box']
                    ) ?>
                    <?php echo GhostHtml::a(
                        Html::tag('div', Html::img('app/assets/icon/rekap.png', ['class' => 'pull-left img-responsive']), ['class' => 'box-center']) . Html::tag('span', 'Rekap Jenis Kelamin dan Pegawai'),
                        ['laporan/rekap-per-jenis-kelamin-pegawai'],
                        ['class' => 'box']
                    ) ?>
                    <?php echo GhostHtml::a(
                        Html::tag('div', Html::img('app/assets/icon/rekap.png', ['class' => 'pull-left img-responsive']), ['class' => 'box-center']) . Html::tag('span', 'Rekap Nama Unit, Jenis Kelamin dan Total'),
                        ['laporan/rekap-per-nama-unit-jenis-kelamin-total'],
                        ['class' => 'box']
                    ) ?>
                    <?php echo GhostHtml::a(
                        Html::tag('div', Html::img('app/assets/icon/rekap.png', ['class' => 'pull-left img-responsive']), ['class' => 'box-center']) . Html::tag('span', 'Rekap Nama Unit, Jumlah Pegawai'),
                        ['laporan/rekap-per-nama-unit-pegawai'],
                        ['class' => 'box']
                    ) ?>
                    <?php echo GhostHtml::a(
                        Html::tag('div', Html::img('app/assets/icon/user.png', ['class' => 'pull-left img-responsive']), ['class' => 'box-center']) . Html::tag('span', 'User'),
                        ['user/index'],
                        ['class' => 'box']
                    ) ?>
                    <?php echo GhostHtml::a(
                        Html::tag('div', Html::img('app/assets/icon/sandi.png', ['class' => 'pull-left img-responsive']), ['class' => 'box-center']) . Html::tag('span', 'Mengubah Password'),
                        ['auth/change-own-password'],
                        ['class' => 'box']

                    ) ?>

                </div>
            </div>
        </div>
    </div>
</div>
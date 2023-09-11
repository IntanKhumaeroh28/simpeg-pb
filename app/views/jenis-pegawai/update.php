<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\JenisPegawai $model */

$this->title = 'Update Data Jenis Pegawai: ' . $model->kode_jenis_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_jenis_pegawai, 'url' => ['view', 'kode_jenis_pegawai' => $model->kode_jenis_pegawai]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-pegawai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
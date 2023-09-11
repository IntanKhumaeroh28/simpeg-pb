<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\RiwayatKeluarga $model */

$this->title = $model->id_riwayat_keluarga;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Keluargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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
            'hub_keluarga',
            'nik',
            'tgl_lahir',
            'id_pegawai',
            'id_hubungan_keluarga',
        ],
    ]) ?>

</div>

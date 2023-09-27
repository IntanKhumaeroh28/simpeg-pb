<?php

use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\JenisPegawai $model */

$this->title = $model->kode_jenis_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jenis-pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= GhostHtml::a('Update', ['jenis-pegawai/update', 'kode_jenis_pegawai' => $model->kode_jenis_pegawai], ['class' => 'btn btn-primary']) ?>
        <?= GhostHtml::a('Delete', ['jenis-pegawai/delete', 'kode_jenis_pegawai' => $model->kode_jenis_pegawai], [
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
            'kode_jenis_pegawai',
            'nama_jenis_pegawai',
        ],
    ]) ?>

</div>
<?php

use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\RiwayatPendidikan $model */

$this->title = $model->id_riwayat_pendidikan;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="riwayat-pendidikan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= GhostHtml::a('Update', ['riwayat-pendidikan/update', 'id_riwayat_pendidikan' => $model->id_riwayat_pendidikan], ['class' => 'btn btn-primary']) ?>
        <?= GhostHtml::a('Delete', ['riwayat-pendidikan/delete', 'id_riwayat_pendidikan' => $model->id_riwayat_pendidikan], [
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
            [
                'attribute' => 'id_pegawai',
                'label' => 'id pegawai',
                'value' => function ($model) {
                    return $model->biodataPegawai->id_pegawai;
                }
            ],
            [
                'attribute' => 'id_pegawai',
                'value' => function ($model) {
                    return $model->biodataPegawai->nama;
                }
            ],
            'tahun_tamat',
            //'dokumen',
            // [
            //     'attribute' => 'dokumen',
            //     'format' => 'raw',
            //     'value' => function ($model) {
            //         // var_dump(Yii::getAlias('@web/files/dokumen/') . $model->dokumen);
            //         // die;
            //         // return Html::img(Yii::getAlias('@web/files/images/dokumen/') . $model->dokumen, ['height' => '200px']);
            //         return 
            //     }

            // ],
            [
                'attribute' => 'id_pendidikan_formal',
                'value' => function ($model) {
                    return $model->pendidikanFormal->nama_pendidikan;
                }
            ],

        ],
    ]) ?>

    <h2> Dokumen Ijazah </h2>
    <?php
    echo '<embed src="' . Yii::getAlias('@web/files/dokumen/') . $model->dokumen . '" type="application/pdf" width="1110" height="600"></embed>';
    ?>

</div>
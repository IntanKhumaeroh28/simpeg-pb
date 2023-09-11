<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RiwayatPendidikan $model */

$this->title = 'Update Riwayat Pendidikan: ' . $model->id_riwayat_pendidikan;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_riwayat_pendidikan, 'url' => ['view', 'id_riwayat_pendidikan' => $model->id_riwayat_pendidikan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="riwayat-pendidikan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
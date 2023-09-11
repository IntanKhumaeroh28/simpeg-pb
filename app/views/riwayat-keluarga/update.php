<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RiwayatKeluarga $model */

$this->title = 'Update Riwayat Keluarga: ' . $model->id_riwayat_keluarga;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Keluargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_riwayat_keluarga, 'url' => ['view', 'id_riwayat_keluarga' => $model->id_riwayat_keluarga]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="riwayat-keluarga-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

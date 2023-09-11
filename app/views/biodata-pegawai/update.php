<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BiodataPegawai $model */

$this->title = 'Update Biodata Pegawai: ' . $model->id_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Biodata Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pegawai, 'url' => ['view', 'id_pegawai' => $model->id_pegawai]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="biodata-pegawai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
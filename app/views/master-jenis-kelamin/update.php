<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterJenisKelamin $model */

$this->title = 'Update Data Jenis Kelamin: ' . $model->kode_jenis_kelamin;
$this->params['breadcrumbs'][] = ['label' => 'Master Jenis Kelamin', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_jenis_kelamin, 'url' => ['view', 'kode_jenis_kelamin' => $model->kode_jenis_kelamin]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-jenis-kelamin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
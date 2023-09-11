<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\JenisPegawai $model */

$this->title = 'Create Jenis Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-pegawai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
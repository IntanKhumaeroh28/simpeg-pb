<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterStatusPerkawinan $model */

$this->title = 'Update Data Status Perkawinan: ' . $model->id_status_perkawinan;
$this->params['breadcrumbs'][] = ['label' => 'Master Status Perkawinan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_status_perkawinan, 'url' => ['view', 'id_status_perkawinan' => $model->id_status_perkawinan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-status-perkawinan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
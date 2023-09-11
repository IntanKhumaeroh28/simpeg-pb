<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterHubunganKeluarga $model */

$this->title = 'Update Master Hubungan Keluarga: ' . $model->id_hubungan_keluarga;
$this->params['breadcrumbs'][] = ['label' => 'Master Hubungan Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_hubungan_keluarga, 'url' => ['view', 'id_hubungan_keluarga' => $model->id_hubungan_keluarga]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-hubungan-keluarga-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
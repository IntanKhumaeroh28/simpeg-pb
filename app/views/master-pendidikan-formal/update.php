<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterPendidikanFormal $model */

$this->title = 'Update Master Pendidikan Formal: ' . $model->nama_pendidikan;
$this->params['breadcrumbs'][] = ['label' => 'Master Pendidikan Formal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pendidikan_formal, 'url' => ['view', 'id_pendidikan_formal' => $model->id_pendidikan_formal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-pendidikan-formal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
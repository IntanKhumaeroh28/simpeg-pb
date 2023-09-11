<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterAgama $model */

$this->title = 'Update Data Agama: ' . $model->id_agama;
$this->params['breadcrumbs'][] = ['label' => 'Master Agamas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_agama, 'url' => ['view', 'id_agama' => $model->id_agama]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-agama-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
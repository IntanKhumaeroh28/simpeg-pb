<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UnitKerja $model */

$this->title = 'Update Unit Kerja: ' . $model->kode_unit;
$this->params['breadcrumbs'][] = ['label' => 'Unit Kerjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_unit, 'url' => ['view', 'kode_unit' => $model->kode_unit]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unit-kerja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

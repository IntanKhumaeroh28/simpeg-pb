<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\UnitKerja $model */

$this->title = $model->kode_unit;
$this->params['breadcrumbs'][] = ['label' => 'Unit Kerjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="unit-kerja-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'kode_unit' => $model->kode_unit], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'kode_unit' => $model->kode_unit], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kode_unit',
            'nama_unit',
        ],
    ]) ?>

</div>
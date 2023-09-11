<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\MasterHubunganKeluarga $model */

$this->title = $model->id_hubungan_keluarga;
$this->params['breadcrumbs'][] = ['label' => 'Master Hubungan Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-hubungan-keluarga-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_hubungan_keluarga' => $model->id_hubungan_keluarga], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_hubungan_keluarga' => $model->id_hubungan_keluarga], [
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
            'id_hubungan_keluarga',
            'hubungan_keluarga',
        ],
    ]) ?>

</div>
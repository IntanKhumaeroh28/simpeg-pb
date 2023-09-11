<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\MasterJenisKelamin $model */

$this->title = $model->kode_jenis_kelamin;
$this->params['breadcrumbs'][] = ['label' => 'Master Jenis Kelamins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-jenis-kelamin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'kode_jenis_kelamin' => $model->kode_jenis_kelamin], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'kode_jenis_kelamin' => $model->kode_jenis_kelamin], [
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
            'kode_jenis_kelamin',
            'jenis_kelamin',
        ],
    ]) ?>

</div>

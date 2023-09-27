<?php

use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\MasterStatusPerkawinan $model */

$this->title = $model->id_status_perkawinan;
$this->params['breadcrumbs'][] = ['label' => 'Master Status Perkawinans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-status-perkawinan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= GhostHtml::a('Update', ['master-status-perkawinan/update', 'id_status_perkawinan' => $model->id_status_perkawinan], ['class' => 'btn btn-primary']) ?>
        <?= GhostHtml::a('Delete', ['master-status-perkawinan/delete', 'id_status_perkawinan' => $model->id_status_perkawinan], [
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
            'id_status_perkawinan',
            'status_perkawinan',
        ],
    ]) ?>

</div>

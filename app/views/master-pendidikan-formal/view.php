<?php

use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\MasterPendidikanFormal $model */

$this->title = $model->id_pendidikan_formal;
$this->params['breadcrumbs'][] = ['label' => 'Master Pendidikan Formals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-pendidikan-formal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= GhostHtml::a('Update', ['master-pendidikan-formal/update', 'id_pendidikan_formal' => $model->id_pendidikan_formal], ['class' => 'btn btn-primary']) ?>
        <?= GhostHtml::a('Delete', ['master-pendidikan-formal/delete', 'id_pendidikan_formal' => $model->id_pendidikan_formal], [
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
            //'id_pendidikan_formal',
            'nama_pendidikan',
        ],
    ]) ?>

</div>
<?php

use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\MasterAgama $model */

$this->title = $model->id_agama;
$this->params['breadcrumbs'][] = ['label' => 'Master Agamas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-agama-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= GhostHtml::a('Update', ['master-agama/update', 'id_agama' => $model->id_agama], ['class' => 'btn btn-primary']) ?>
        <?= GhostHtml::a('Delete', ['master-agama/delete', 'id_agama' => $model->id_agama], [
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
            'id_agama',
            'agama',
        ],
    ]) ?>

</div>
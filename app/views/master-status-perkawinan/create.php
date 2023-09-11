<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterStatusPerkawinan $model */

$this->title = 'Create Master Status Perkawinan';
$this->params['breadcrumbs'][] = ['label' => 'Master Status Perkawinan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-status-perkawinan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
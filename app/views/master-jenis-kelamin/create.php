<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterJenisKelamin $model */

$this->title = 'Create Master Jenis Kelamin';
$this->params['breadcrumbs'][] = ['label' => 'Master Jenis Kelamin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-jenis-kelamin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
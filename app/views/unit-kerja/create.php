<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UnitKerja $model */

$this->title = 'Create Unit Kerja';
$this->params['breadcrumbs'][] = ['label' => 'Unit Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-kerja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
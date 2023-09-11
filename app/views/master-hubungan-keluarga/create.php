<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterHubunganKeluarga $model */

$this->title = 'Entri Master Hubungan Keluarga';
$this->params['breadcrumbs'][] = ['label' => 'Master Hubungan Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-hubungan-keluarga-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
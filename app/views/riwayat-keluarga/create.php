<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RiwayatKeluarga $model */

$this->title = 'Entri Riwayat Keluarga';
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-keluarga-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
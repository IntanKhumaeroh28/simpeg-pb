<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterPendidikanFormal $model */

$this->title = 'Create Master Pendidikan Formal';
$this->params['breadcrumbs'][] = ['label' => 'Master Pendidikan Formal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-pendidikan-formal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
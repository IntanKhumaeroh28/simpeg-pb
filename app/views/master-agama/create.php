<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterAgama $model */

$this->title = 'Create Master Agama';
$this->params['breadcrumbs'][] = ['label' => 'Master Agama', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-agama-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
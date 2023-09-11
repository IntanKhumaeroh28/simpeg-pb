<?php

use app\models\MasterAgama;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MasterAgamaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Master Agamas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-agama-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Master Agama', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_agama',
            'agama',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MasterAgama $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_agama' => $model->id_agama]);
                 }
            ],
        ],
    ]); ?>


</div>

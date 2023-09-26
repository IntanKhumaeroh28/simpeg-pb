<?php

use app\models\MasterStatusPerkawinan;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MasterStatusPerkawinanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Master Status Perkawinan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-status-perkawinan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= GhostHtml::a('Entri Data Status Perkawinan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_status_perkawinan',
            'status_perkawinan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MasterStatusPerkawinan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_status_perkawinan' => $model->id_status_perkawinan]);
                }
            ],
        ],
    ]); ?>


</div>
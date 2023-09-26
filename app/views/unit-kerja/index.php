<?php

use app\models\UnitKerja;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UnitKerjaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Unit Kerja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-kerja-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= GhostHtml::a('Entri Unit Kerja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kode_unit',
            'nama_unit',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UnitKerja $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'kode_unit' => $model->kode_unit]);
                }
            ],
        ],
    ]); ?>


</div>
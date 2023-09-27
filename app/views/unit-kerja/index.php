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
        <?= GhostHtml::a('Entri Unit Kerja', ['unit-kerja/create'], ['class' => 'btn btn-success']) ?>
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
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, UnitKerja $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'kode_unit' => $model->kode_unit]);
            //     }
            // ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {edit} {hapus}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return GhostHtml::a('View', ['unit-kerja/view', 'kode_unit' => $model['kode_unit']], [
                            'class' => 'btn btn-primary btn-sm'
                        ]);
                    },
                    'edit' => function ($url, $model) {
                        return GhostHtml::a('Edit', ['unit_kerja/update', 'kode_unit' => $model['kode_unit']], [
                            'class' => 'btn btn-warning btn-sm'
                        ]);
                    },
                    'hapus' => function ($url, $model) {
                        return GhostHtml::a('Delete', ['unit-kerja/delete', 'kode_unit' => $model['kode_unit']], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
<?php

use app\models\MasterHubunganKeluarga;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MasterHubunganKeluargaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Master Hubungan Keluarga';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-hubungan-keluarga-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= GhostHtml::a('Entri Master Hubungan Keluarga', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_hubungan_keluarga',
            'hubungan_keluarga',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, MasterHubunganKeluarga $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id_hubungan_keluarga' => $model->id_hubungan_keluarga]);
            //     }
            // ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {edit} {hapus}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return GhostHtml::a('View', ['master-hubungan-keluarga/view', 'id_hubungan_keluarga' => $model['id_hubungan_keluarga']], [
                            'class' => 'btn btn-primary btn-sm'
                        ]);
                    },
                    'edit' => function ($url, $model) {
                        return GhostHtml::a('Edit', ['master-hubungan-keluarga/update', 'id_hubungan-keluarga' => $model['id_hubungan_keluarga']], [
                            'class' => 'btn btn-warning btn-sm'
                        ]);
                    },
                    'hapus' => function ($url, $model) {
                        return GhostHtml::a('Delete', ['master-hubungan-keluarga/delete', 'id_hubungan_keluarga' => $model['id_hubungan_keluarga']], [
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
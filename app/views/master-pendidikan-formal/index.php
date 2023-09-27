<?php

use app\models\MasterPendidikanFormal;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MasterPendidikanFormalSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Master Pendidikan Formal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-pendidikan-formal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= GhostHtml::a('Create Master Pendidikan Formal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_pendidikan_formal',
            'nama_pendidikan',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, MasterPendidikanFormal $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id_pendidikan_formal' => $model->id_pendidikan_formal]);
            //     }
            // ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {edit} {hapus}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return GhostHtml::a('View', ['master-pendidikan-formal/view', 'id_pendidikan_formal' => $model['id_pendidikan_formal']], [
                            'class' => 'btn btn-primary btn-sm'
                        ]);
                    },
                    'edit' => function ($url, $model) {
                        return GhostHtml::a('Edit', ['master-pendidikan-formal/update', 'id_pendidikan_formal' => $model['id_pendidikan_formal']], [
                            'class' => 'btn btn-warning btn-sm'
                        ]);
                    },
                    'hapus' => function ($url, $model) {
                        return GhostHtml::a('Delete', ['master-pendidikan-formal/delete', 'id_pendidikan_formal' => $model['id_pendidikan_formal']], [
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
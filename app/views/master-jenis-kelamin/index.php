<?php

use app\models\MasterJenisKelamin;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MasterJenisKelaminSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Master Jenis Kelamin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-jenis-kelamin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= GhostHtml::a('Entri Jenis Kelamin', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kode_jenis_kelamin',
            'jenis_kelamin',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, MasterJenisKelamin $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'kode_jenis_kelamin' => $model->kode_jenis_kelamin]);
            //     }
            // ],

            [
                'class' => ActionColumn::className(),
                'template' => '{view} {edit} {hapus}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return GhostHtml::a('View', ['master-jenis-kelamin/view', 'kode_jenis_kelamin' => $model['kode_jenis_kelamin']], [
                            'class' => 'btn btn-primary btn-sm'
                        ]);
                    },
                    'edit' => function ($url, $model) {
                        return GhostHtml::a('Edit', ['master-jenis-kelamin/update', 'kode_jenis_kelamin' => $model['kode_jenis_kelamin']], [
                            'class' => 'btn btn-warning btn-sm'
                        ]);
                    },
                    'hapus' => function ($url, $model) {
                        return GhostHtml::a('Delete', ['master-jenis-kelamin/delete', 'kode_jenis_kelamin' => $model['kode_jenis_kelamin']], [
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
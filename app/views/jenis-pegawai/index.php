<?php

use app\models\JenisPegawai;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\JenisPegawaiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Jenis Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= GhostHtml::a('Entri Jenis Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kode_jenis_pegawai',
            'nama_jenis_pegawai',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, JenisPegawai $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'kode_jenis_pegawai' => $model->kode_jenis_pegawai]);
            //     }
            // ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {edit} {hapus}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return GhostHtml::a('View', ['jenis-pegawai/view', 'kode_jenis_pegawai' => $model['kode_jenis_pegawai']], [
                            'class' => 'btn btn-primary btn-sm'
                        ]);
                    },
                    'edit' => function ($url, $model) {
                        return GhostHtml::a('Edit', ['jenis-pegawai/update', 'kode_jenis_pegawai' => $model['kode_jenis_pegawai']], [
                            'class' => 'btn btn-warning btn-sm'
                        ]);
                    },
                    'hapus' => function ($url, $model) {
                        return GhostHtml::a('Delete', ['jenis-pegawai/delete', 'kode_jenis_pegawai' => $model['kode_jenis_pegawai']], [
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
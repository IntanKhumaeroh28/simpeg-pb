<?php

use app\models\JenisPegawai;
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
        <?= Html::a('Entri Jenis Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, JenisPegawai $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'kode_jenis_pegawai' => $model->kode_jenis_pegawai]);
                }
            ],
        ],
    ]); ?>


</div>
<?php

use app\models\RiwayatKeluarga;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RiwayatKeluargaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Riwayat Keluarga';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-keluarga-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Entri Riwayat Keluarga', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_riwayat_keluarga',
            'nama',
            //'hub_keluarga',
            'nik',
            'tgl_lahir',
            // 'id_pegawai',
            // 'id_hubungan_keluarga',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RiwayatKeluarga $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_riwayat_keluarga' => $model->id_riwayat_keluarga]);
                }
            ],
        ],
    ]); ?>


</div>
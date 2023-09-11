<?php

use app\models\RiwayatPendidikan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RiwayatPendidikanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Riwayat Pendidikan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-pendidikan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Entri Riwayat Pendidikan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_riwayat_pendidikan',
            'id_pegawai',
            'tahun_tamat',
            'dokumen',
            'id_pendidikan_formal',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RiwayatPendidikan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_riwayat_pendidikan' => $model->id_riwayat_pendidikan]);
                }
            ],
        ],
    ]); ?>


</div>
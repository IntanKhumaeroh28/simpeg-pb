<?php

use app\models\BiodataPegawai;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BiodataPegawaiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Biodata Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biodata-pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Entri Biodata Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pegawai',
            'nik',
            'nama',
            'tgl_lahir',
            'tempat_lahir',
            //'alamat',
            //'no_telp',
            //'email:email',
            //'foto',
            //'jumlah_pasangan',
            //'jumlah_anak',
            //'tahun_masuk',
            //'kode_jenis_kelamin',
            //'kode_jenis_pegawai',
            //'kode_unit',
            //'id_agama',
            //'id_status_perkawinan',
            //'username',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BiodataPegawai $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pegawai' => $model->id_pegawai]);
                }
            ],
        ],
    ]); ?>


</div>
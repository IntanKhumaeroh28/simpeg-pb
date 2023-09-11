<?php

use app\models\MasterJenisKelamin;
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
        <?= Html::a('Entri Jenis Kelamin', ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MasterJenisKelamin $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'kode_jenis_kelamin' => $model->kode_jenis_kelamin]);
                }
            ],
        ],
    ]); ?>


</div>
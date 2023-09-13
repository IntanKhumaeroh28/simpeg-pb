<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RiwayatKeluargaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="riwayat-keluarga-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_riwayat_keluarga') ?>

    <?= $form->field($model, 'nama') ?>

    <?php // $form->field($model, 'hub_keluarga') 
    ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'tgl_lahir') ?>

    <?php // echo $form->field($model, 'id_pegawai') 
    ?>

    <?php echo $form->field($model, 'id_hubungan_keluarga') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RiwayatPendidikanSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="riwayat-pendidikan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!-- <?= $form->field($model, 'id_riwayat_pendidikan') ?> -->

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'tahun_tamat') ?>

    <?= $form->field($model, 'dokumen') ?>

    <?= $form->field($model, 'id_pendidikan_formal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
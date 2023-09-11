<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\JenisPegawai $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jenis-pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_jenis_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_jenis_pegawai')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

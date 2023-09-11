<?php

use app\models\BiodataPegawai;
use app\models\MasterPendidikanFormal;
use app\models\RiwayatPendidikan;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RiwayatPendidikan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="riwayat-pendidikan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $data = BiodataPegawai::find()->asArray()->all();

    echo $form->field($model, 'id_pegawai')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($data, 'id_pegawai', 'nama'),
        'options' => ['placeholder' => 'Pilih id_pegawai ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'tahun_tamat')->textInput() ?>

    <?= $form->field($model, 'dokumen')->textInput(['maxlength' => true]) ?>

    <?php
    $data = MasterPendidikanFormal::find()->asArray()->all();

    echo $form->field($model, 'id_pendidikan_formal')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($data, 'id_pendidikan_formal', 'nama_pendidikan'),
        'options' => ['placeholder' => 'Pilih id_pendidikan_formal ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

use app\models\BiodataPegawai;
use app\models\MasterHubunganKeluarga;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RiwayatKeluarga $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="riwayat-keluarga-form">

    <?php $form = ActiveForm::begin(
        ['options' => ['enctype' => 'multipart/form-data']]
    ); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'dokumen_file_kk')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]); ?>

    <?= $form->field($model, 'file_kk')->hiddenInput()->label('') ?>

    <?php
    echo $form->field($model, 'dokumen_file_akte')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]); ?>

    <?= $form->field($model, 'file_akte')->hiddenInput()->label('') ?>

    <?php
    echo $form->field($model, 'tgl_lahir')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pickerIcon' => '<i class="fas fa-calendar-alt text-primary">KALENDER</i>',
        'removeIcon' => '<i class="fas fa-trash text-danger">CLEAR</i>',
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy'
        ]
    ]);
    ?>

    <?php
    $data = BiodataPegawai::find()->all();

    echo $form->field($model, 'id_pegawai')->widget(Select2::classname(), [
        // map(arraynya, yang akan disimpan ke db, yang akan ditampilkan ke user)
        'data' => ArrayHelper::map($data, 'id_pegawai', 'nama'),
        'options' => ['placeholder' => 'pilih id pegawai'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?php
    $data = MasterHubunganKeluarga::find()->all();

    echo $form->field($model, 'id_hubungan_keluarga')->widget(Select2::classname(), [
        // map(arraynya, yang akan disimpan ke db, yang akan ditampilkan ke user)
        'data' => ArrayHelper::map($data, 'id_hubungan_keluarga', 'hubungan_keluarga'),
        'options' => ['placeholder' => 'pilih id hubungan keluarga'],
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
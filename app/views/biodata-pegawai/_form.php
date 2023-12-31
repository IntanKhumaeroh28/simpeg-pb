<?php

use app\models\BiodataPegawai;
use app\models\JenisPegawai;
use app\models\MasterAgama;
use app\models\MasterJenisKelamin;
use app\models\MasterStatusPerkawinan;
use app\models\UnitKerja;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BiodataPegawai $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="biodata-pegawai-form">

    <?php $form = ActiveForm::begin(
        ['options' => ['enctype' => 'multipart/form-data']]
    ); ?>

    <?php
    if ($model->isNewRecord) {
        echo  $form->field($model, 'id_pegawai')->textInput(['maxlength' => true]);
        # code...
    }
    ?>

    <?php // $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'image_file')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]); ?>

    <?php
    if ($model->foto != null) {
        echo Html::img(Yii::getAlias('@web/files/img/') . $model->foto, ['height' => '200px']);
    } ?>

    <?= $form->field($model, 'foto')->hiddenInput()->label('') ?>

    <?= $form->field($model, 'jumlah_pasangan')->textInput() ?>

    <?= $form->field($model, 'jumlah_anak')->textInput() ?>

    <?= $form->field($model, 'tahun_masuk')->textInput() ?>

    <?php
    $data = MasterJenisKelamin::find()->all();

    echo $form->field($model, 'kode_jenis_kelamin')->widget(Select2::classname(), [
        // map(arraynya, yang akan disimpan ke db, yang akan ditampilkan ke user)
        'data' => ArrayHelper::map($data, 'kode_jenis_kelamin', 'jenis_kelamin'),
        'options' => ['placeholder' => 'pilih jenis kelamin'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?php
    $data = JenisPegawai::find()->all();

    echo $form->field($model, 'kode_jenis_pegawai')->widget(Select2::classname(), [
        // map(arraynya, yang akan disimpan ke db, yang akan ditampilkan ke user)
        'data' => ArrayHelper::map($data, 'kode_jenis_pegawai', 'nama_jenis_pegawai'),
        'options' => ['placeholder' => 'pilih jenis pegawai'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?php
    $data = UnitKerja::find()->all();

    echo $form->field($model, 'kode_unit')->widget(Select2::classname(), [
        // map(arraynya, yang akan disimpan ke db, yang akan ditampilkan ke user)
        'data' => ArrayHelper::map($data, 'kode_unit', 'nama_unit'),
        'options' => ['placeholder' => 'pilih nama unit'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?php
    $data = MasterAgama::find()->all();

    echo $form->field($model, 'id_agama')->widget(Select2::classname(), [
        // map(arraynya, yang akan disimpan ke db, yang akan ditampilkan ke user)
        'data' => ArrayHelper::map($data, 'id_agama', 'agama'),
        'options' => ['placeholder' => 'pilih agama'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?php
    $data = MasterStatusPerkawinan::find()->all();

    echo $form->field($model, 'id_status_perkawinan')->widget(Select2::classname(), [
        // map(arraynya, yang akan disimpan ke db, yang akan ditampilkan ke user)
        'data' => ArrayHelper::map($data, 'id_status_perkawinan', 'status_perkawinan'),
        'options' => ['placeholder' => 'pilih status perkawinan'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?php // $form->field($model, 'created_at')->textInput() 
    ?>

    <?php // $form->field($model, 'updated_at')->textInput() 
    ?>

    <?php // $form->field($model, 'created_by')->textInput(['maxlength' => true]) 
    ?>

    <?php // $form->field($model, 'updated_by')->textInput(['maxlength' => true]) 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
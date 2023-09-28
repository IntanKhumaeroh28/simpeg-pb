<?php

use app\models\BiodataPegawai;
use app\models\MasterPendidikanFormal;
use app\models\User;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RiwayatPendidikan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="riwayat-pendidikan-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php
    if (User::hasRole('superadmin') || User::hasRole('kepegawaian')) {
        $data = BiodataPegawai::find()->asArray()->all();

        echo $form->field($model, 'id_pegawai')->widget(Select2::classname(), [
            'data' => ArrayHelper::map($data, 'id_pegawai', 'nama'),
            'options' => ['placeholder' => 'Pilih nama pegawai ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    }
    ?>
    <?= $form->field($model, 'tahun_tamat')->textInput() ?>
    <?php
    echo $form->field($model, 'ijazah_file')->widget(FileInput::classname(), [
        'options' => ['accept' => 'file/*'],
        'options' => ['accept' => 'application/pdf'],
    ]);
    ?>
    <!-- <?php
            // if ($model->dokumen != null) {
            //     echo Html::img(Yii::getAlias('@web/files/dokumen/') . $model->dokumen, ['height' => '200px']);
            // }
            // 
            ?> -->
    <?php
    // $form->field($model, 'dokumen')->hiddenInput()->label('') 
    ?>
    <?php
    $data = MasterPendidikanFormal::find()->asArray()->all();
    echo $form->field($model, 'id_pendidikan_formal')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($data, 'id_pendidikan_formal', 'nama_pendidikan'),
        'options' => ['placeholder' => 'Pilih nama pendidikan ...'],
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
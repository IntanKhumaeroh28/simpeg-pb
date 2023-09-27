<?php

use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BiodataPegawaiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="biodata-pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'tgl_lahir') ?>

    <?= $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'alamat') 
    ?>

    <?php // echo $form->field($model, 'no_telp') 
    ?>

    <?php // echo $form->field($model, 'email') 
    ?>

    <?php // echo $form->field($model, 'foto') 
    ?>

    <?php // echo $form->field($model, 'jumlah_pasangan') 
    ?>

    <?php // echo $form->field($model, 'jumlah_anak') 
    ?>

    <?php // echo $form->field($model, 'tahun_masuk') 
    ?>

    <?php // echo $form->field($model, 'kode_jenis_kelamin') 
    ?>

    <?php // echo $form->field($model, 'kode_jenis_pegawai') 
    ?>

    <?php // echo $form->field($model, 'kode_unit') 
    ?>

    <?php // echo $form->field($model, 'id_agama') 
    ?>

    <?php // echo $form->field($model, 'id_status_perkawinan') 
    ?>

    <?php // echo $form->field($model, 'created_at') 
    ?>

    <?php // echo $form->field($model, 'updated_at') 
    ?>

    <?php // echo $form->field($model, 'created_by') 
    ?>

    <?php // echo $form->field($model, 'updated_by') 
    ?>

    <div class="form-group">
        <?= GhostHtml::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= GhostHtml::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
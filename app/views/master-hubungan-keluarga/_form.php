<?php

use app\models\MasterHubunganKeluarga;
use app\models\RiwayatKeluarga;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MasterHubunganKeluarga $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="master-hubungan-keluarga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'id_hubungan_keluarga')->textInput(['maxlength' => true]) 
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
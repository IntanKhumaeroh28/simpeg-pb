<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MasterHubunganKeluarga $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="master-hubungan-keluarga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hubungan_keluarga')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

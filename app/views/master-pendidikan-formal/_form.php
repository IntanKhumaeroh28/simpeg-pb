<?php


use app\models\MasterPendidikanFormal;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MasterPendidikanFormal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="master-pendidikan-formal-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'nama_pendidikan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

/**
 * @var $this yii\web\View
 * @var $model webvimark\modules\UserManagement\models\forms\LoginForm
 */

use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
?>

<div class="container" id="login-wrapper" style="margin-left: 425px; margin-top: 120px;">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?= UserManagementModule::t('front', 'From Login') ?></h3>
				</div>
				<div class="panel-body">
					<div class="col-lg-8 of">


						<?php $form = ActiveForm::begin([
							'id'      => 'login-form',
							'options' => ['autocomplete' => 'off'],
							'validateOnBlur' => false,
							'fieldConfig' => [
								'template' => "{input}\n{error}",
							],
						]) ?>

						<?= $form->field($model, 'username')
							->textInput(['placeholder' => $model->getAttributeLabel('username'), 'autocomplete' => 'off']) ?>

						<?= $form->field($model, 'password')
							->passwordInput(['placeholder' => $model->getAttributeLabel('password'), 'autocomplete' => 'off']) ?>

						<?= (isset(Yii::$app->user->enableAutoLogin) && Yii::$app->user->enableAutoLogin) ? $form->field($model, 'rememberMe')->checkbox(['value' => true]) : '' ?>

						<?= Html::submitButton(
							UserManagementModule::t('front', 'Login'),
							['class' => 'btn btn-lg btn-primary btn-block']
						) ?>

						<div class="row registration-block">
							<div class="col-sm-6">
								<?= GhostHtml::a(
									UserManagementModule::t('front', "Registration"),
									['/user-management/auth/registration']
								) ?>
							</div>
							<div class="col-sm-6 text-right">
								<?= GhostHtml::a(
									UserManagementModule::t('front', "Forgot password ?"),
									['/user-management/auth/password-recovery']
								) ?>
							</div>
						</div>


					</div>



					<?php ActiveForm::end() ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$css = <<<CSS
html, body {
	/* background: #eee; */
	background-image: url('../../../assets/images/office.jpg');
	-webkit-box-shadow: inset 0 0 100px rgba(0,0,0,.5);
	box-shadow: inset 0 0 100px rgba(0,0,0,.5);
	height: 100%;
	min-height: 100%;
	position: relative;
}
#login-wrapper {
	background-image: url('../../../assets/images/office.jpg');
	position: relative;
	top: 30%;
}
#login-wrapper .registration-block {
	margin-top: 15px;
}
CSS;

$this->registerCss($css);
?>
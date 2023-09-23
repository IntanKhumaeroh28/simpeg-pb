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

<style>
	.intan {
		background-color: #006A4E;

	}

	/* .intan:hover {
		transform: scale(1.2);
		transition: transform 330ms ease-in-out;
		color: white;
	} */
</style>
<div class="site-index">
	<div class="container-custom">
		<div class="row mt-3">
			<div class="col d-flex justify-content-center">
				<h4>Sistem Informasi Kepegawaian Prabubima Tech</h4>

			</div>
		</div>
		<div class="row mt-2">
			<div class="col" style="text-align: center;">
				<img src="https://prabubimatech.com/assets/image/logo.png" style="height: 150px;">
				<br>
				<div class="container" id="login-wrapper ">
					</br>
					<div class="row " style="padding-left: 85px;">
						<div class="col-md-5 offset-md-3 bg-light rounded-lg">
							<div class="panel panel-default mx-5 my-5 ">
								<div class="panel-heading text-center ">
									<h3 class="panel-title"><?= UserManagementModule::t('front', 'Login Form') ?></h3>
								</div>
								<div class="panel-body ">
									<div class="col-lg-8 offset-2">
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
											['class' => 'btn btn-lg btn-block intan']
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
/* body {
		background-color: lightseagreen;

	} */
	
CSS;

				$this->registerCss($css);
				?>
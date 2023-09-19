<?php

namespace app\components;

use webvimark\modules\UserManagement\components\GhostAccessControl as ComponentGhostAccessControl;
use webvimark\modules\UserManagement\models\rbacDB\Route;
use webvimark\modules\UserManagement\models\User;
use yii\base\Action;
use Yii;
use yii\web\ForbiddenHttpException;

class GhostAccessControl extends ComponentGhostAccessControl
{

	protected function denyAccess()
	{
		if (Yii::$app->user->getIsGuest()) {
			Yii::$app->getResponse()->redirect(['/auth/login'])->send();
		} else {
			Yii::$app->getResponse()->redirect(['/auth/forbidden'])->send();
		}
		Yii::$app->end();
	}
}

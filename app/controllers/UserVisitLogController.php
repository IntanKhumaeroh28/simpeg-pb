<?php

namespace app\controllers;

use Yii;
use webvimark\modules\UserManagement\models\UserVisitLog;
use webvimark\modules\UserManagement\models\search\UserVisitLogSearch;
use webvimark\components\AdminDefaultController;
use webvimark\modules\UserManagement\controllers\UserVisitLogController as ControllersUserVisitLogController;

/**
 * UserVisitLogController implements the CRUD actions for UserVisitLog model.
 */
class UserVisitLogController extends ControllersUserVisitLogController
{
	/**
	 * @var UserVisitLog
	 */
	public $modelClass = 'webvimark\modules\UserManagement\models\UserVisitLog';

	/**
	 * @var UserVisitLogSearch
	 */
	public $modelSearchClass = 'webvimark\modules\UserManagement\models\search\UserVisitLogSearch';

	public $enableOnlyActions = ['index', 'view', 'grid-page-size'];
}

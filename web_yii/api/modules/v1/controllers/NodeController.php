<?php
/**
 * Created by PhpStorm.
 * User: qj
 * Date: 29/3/15
 * Time: 17:58
 */

namespace app\api\modules\v1\controllers;


use app\api\components\MyActiveController;
use yii\filters\AccessControl;

class NodeController extends MyActiveController
{

    public $modelClass = 'app\api\models\Node';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator']['except'] = ['index', 'view', 'search',
            'create', 'delete', 'update'];

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'actions' => ['view', 'index', 'search'],
                    'allow' => true,
                    'roles' => ['?'],
                ],
                [
                    'actions' => ['create', 'delete', 'update'],
                    'allow' => true,
                    'roles' => ['?',],
                ],
            ],
            # if user not login, and not allowed for current action, return following exception
            'denyCallback' => function ($rule, $action) {
                throw new \Exception('You are not allowed to access this page');
            },
        ];

        return $behaviors;
    }

}
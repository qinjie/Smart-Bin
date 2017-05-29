<?php
/**
 * Created by PhpStorm.
 * User: qj
 * Date: 29/3/15
 * Time: 17:58
 */

namespace app\api\modules\v1\controllers;

use app\api\components\MyActiveController;
use app\api\models\NodeData;
use yii\filters\AccessControl;

class NodeDataController extends MyActiveController
{
    public $modelClass = 'app\api\models\NodeData';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator']['except'] = ['index', 'view', 'search',
            'latest-by-project',
            'latest-by-project-and-label',
            'latest-all-labels-by-project',
            'latest-all-labels-in-days-by-project',
            'create', 'delete', 'update'];

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'actions' => ['view', 'index', 'search',
                        'latest-by-project',
                        'latest-all-labels-by-project',
                        'latest-by-project-and-label',
                        'latest-all-labels-in-days-by-project'],
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

    public function actionLatestByProject($projectId)
    {
        $sql = "SELECT n1.*
            FROM nodedata AS n1
            LEFT JOIN nodedata AS n2
                ON (n1.node_id = n2.node_id AND n1.id < n2.id)
            LEFT JOIN node AS n
                ON (n1.node_id = n.id)
            WHERE n2.node_id IS NULL AND n.project_id = :project_id";

        $data = NodeData::findBySql($sql, ['project_id' => $projectId])->all();

        return $data;
    }

    public function actionLatestByProjectAndLabel($projectId, $label)
    {
        $sql = "SELECT n1.*
            FROM nodedata AS n1
            LEFT JOIN nodedata AS n2
                ON (n1.node_id = n2.node_id AND n1.label = n2.label AND n1.id < n2.id)
            LEFT JOIN node AS n
                ON (n1.node_id = n.id)
            WHERE n2.node_id IS NULL AND n.project_id = :project_id AND n1.label = :label";

        $data = NodeData::findBySql($sql, ['project_id' => $projectId, 'label' => $label])->all();

        return $data;
    }

    public function actionLatestAllLabelsByProject($projectId)
    {
        $sql = "SELECT n1.*
            FROM nodedata AS n1
            LEFT JOIN nodedata AS n2
                ON (n1.node_id = n2.node_id AND n1.label = n2.label AND n1.id < n2.id)
            LEFT JOIN node AS n
                ON (n1.node_id = n.id)
            WHERE n2.node_id IS NULL AND n.project_id =  :project_id";
        $data = NodeData::findBySql($sql, ['project_id' => $projectId])->all();

        return $data;
    }

    public function actionLatestAllLabelsInDaysByProject($projectId, $pastDays)
    {
        $days = -$pastDays;
        $sql = "SELECT n1.*
            FROM nodedata AS n1
            LEFT JOIN nodedata AS n2
                ON (n1.node_id = n2.node_id AND n1.label = n2.label AND n1.id < n2.id)
            LEFT JOIN node AS n
                ON (n1.node_id = n.id)
            WHERE n2.node_id IS NULL AND n.project_id =  :project_id AND n1.`modified_at` >= DATE_ADD(CURDATE(), INTERVAL :days DAY)";
        $data = NodeData::findBySql($sql, ['project_id' => $projectId, 'days' => $days])->all();

        return $data;
    }
}
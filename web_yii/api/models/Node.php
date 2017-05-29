<?php

namespace app\api\models;

use Yii;

/**
 * This is the model class for table "node".
 *
 * @property integer $id
 * @property string $label
 * @property string $type
 * @property integer $status
 * @property string $remark
 * @property integer $project_id
 * @property string $created_at
 * @property string $modified_at
 *
 * @property Project $project
 * @property NodeData[] $nodeData
 * @property NodeSetting[] $nodeSettings
 * @property NodePing[] $nodePings
 */
class Node extends \app\models\Node
{

    public function extraFields()
    {
        $new = ['project', 'nodeData', 'nodeSettings', 'nodePings'];
        $fields = array_merge(parent::fields(), $new);
        return $fields;
    }

}

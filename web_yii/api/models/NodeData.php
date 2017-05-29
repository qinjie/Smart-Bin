<?php

namespace app\api\models;

use app\components\MyActiveRecord;
use Yii;

/**
 * This is the model class for table "nodedata".
 *
 * @property integer $id
 * @property integer $node_id
 * @property string $label
 * @property string $value
 * @property integer $node_ping_id
 * @property string $created_at
 * @property string $modified_at
 *
 * @property Node $node
 */
class NodeData extends \app\models\NodeData
{
    public function extraFields()
    {
        $new = ['node'];
        $fields = array_merge(parent::fields(), $new);
        return $fields;
    }

}

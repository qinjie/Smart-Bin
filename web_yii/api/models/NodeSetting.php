<?php

namespace app\api\models;

use Yii;

/**
 * This is the model class for table "nodesetting".
 *
 * @property string $id
 * @property string $node_id
 * @property string $label
 * @property string $value
 * @property string $created_at
 * @property string $modified_at
 *
 * @property Node $node
 */
class NodeSetting extends \app\models\NodeSetting
{
    public function extraFields()
    {
        $new = ['node'];
        $fields = array_merge(parent::fields(), $new);
        return $fields;
    }

}

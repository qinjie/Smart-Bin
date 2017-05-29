<?php

namespace app\api\models;

use Yii;

/**
 * This is the model class for table "nodeping".
 *
 * @property string $id
 * @property string $node_id
 * @property string $created_at
 *
 * @property Node $node
 * @property NodeData[] $nodeData
 */
class NodePing extends \app\models\NodePing
{
    public function extraFields()
    {
        $new = ['node', 'nodeData'];
        $fields = array_merge(parent::fields(), $new);
        return $fields;
    }

}

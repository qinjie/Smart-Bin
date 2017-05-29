<?php

namespace app\models;

use app\components\MyActiveRecord;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "node".
 *
 * @property integer $id
 * @property string $label
 * @property string $type
 * @property integer $status
 * @property string $remark
 * @property integer $project_id
 * @property integer $created_by
 * @property string $created_at
 * @property string $modified_at
 *
 * @property Project $project
 * @property NodeData[] $nodeData
 * @property NodePing[] $nodePings
 * @property NodeSetting[] $nodeSettings
 */
class Node extends MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'node';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                // Modify only created_at not updated attribute
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'modified_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['modified_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => null,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'project_id'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['label'], 'string', 'max' => 50],
            [['type'], 'string', 'max' => 10],
            [['remark'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'type' => 'Type',
            'status' => 'Status',
            'remark' => 'Remark',
            'project_id' => 'Project ID',
            'created_at' => 'Created',
            'modified_at' => 'Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodeData()
    {
        return $this->hasMany(NodeData::className(), ['node_id' => 'id'])->orderBy(['id' => SORT_DESC])->limit(10);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodePings()
    {
        return $this->hasMany(NodePing::className(), ['node_id' => 'id'])->orderBy(['id' => SORT_DESC])->limit(10);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodeSettings()
    {
        return $this->hasMany(NodeSetting::className(), ['node_id' => 'id'])->orderBy(['id' => SORT_ASC])->limit(10);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodeDataByLabel($label, $limit)
    {
        return $this->hasMany(NodeData::className(), ['node_id' => 'id', 'label' => $label])->orderBy(['id' => SORT_DESC])->limit($limit);
    }

    public function getLatestNodeData()
    {
        $sql = "SELECT n1.*
            FROM nodedata AS n1
            LEFT JOIN nodedata AS n2
              ON (n1.node_id = n2.node_id AND n1.label = n2.label AND n1.id < n2.id)
            WHERE n2.node_id IS NULL AND n1.node_id = :node_id";

        $nodeData = NodeData::findBySql($sql, ['node_id' => $this->id])->all();

        return $nodeData;
    }

}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projectsetting".
 *
 * @property string $id
 * @property string $project_id
 * @property string $label
 * @property string $value
 * @property string $created_at
 * @property string $modified_at
 *
 * @property Project $project
 */
class ProjectSetting extends \yii\db\ActiveRecord
{
    const TIMING = 'Timing';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projectsetting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id'], 'required'],
            [['project_id'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['label'], 'string', 'max' => 10],
            [['value'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'label' => 'Label',
            'value' => 'Value',
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
}

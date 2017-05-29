<?php

namespace app\api\models;

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
class ProjectSetting extends \app\models\ProjectSetting
{
    public function extraFields()
    {
        $new = ['project'];
        $fields = array_merge(parent::fields(), $new);
        return $fields;
    }

}

<?php

namespace app\api\models;

use app\components\MyActiveRecord;
use app\models\ProjectSetting;
use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $label
 * @property string $remark
 * @property string $serial
 * @property integer $status
 * @property integer $user_id
 * @property string $created_at
 * @property string $modified_at
 *
 * @property User $owner
 * @property ProjectSetting[] $projectSettings
 * @property ProjectUser[] $projectUsers
 */

class Project extends \app\models\Project
{
    public function extraFields()
    {
        $new = ['owner', 'nodes', 'users'];
        $fields = array_merge(parent::fields(), $new);
        return $fields;
    }

}

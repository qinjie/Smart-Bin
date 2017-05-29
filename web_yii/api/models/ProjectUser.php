<?php

namespace app\api\models;

use app\components\MyActiveRecord;
use Yii;

/**
 * This is the model class for table "projectuser".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $user_id
 * @property string $created_at
 *
 * @property Project $project
 * @property User $user
 */
class ProjectUser extends \app\models\ProjectUser
{
    public function extraFields()
    {
        $new = ['project', 'user'];
        $fields = array_merge(parent::fields(), $new);
        return $fields;
    }

}

<?php

namespace app\api\models;

use Yii;

/**
 * This is the model class for table "usertoken".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $token
 * @property string $label
 * @property string $ip_address
 * @property string $expire
 * @property string $created_at
 *
 * @property User $user
 */
class UserToken extends \app\models\UserToken
{

    public function extraFields()
    {
        $fields = parent::fields();
        $fields[] = 'user';
        return $fields;
    }

}

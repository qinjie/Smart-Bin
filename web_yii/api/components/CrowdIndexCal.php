<?php
/**
 * Created by PhpStorm.
 * User: zqi2
 * Date: 9/3/2016
 * Time: 9:48 PM
 */

namespace app\api\components;


class CrowdIndexCal
{
    public static function calculate($bg_image, $new_image)
    {
        $py_file = \Yii::getAlias('@siteroot') . \Yii::$app->params['file.python.crowd_index'];
        $py_command = "python $py_file $bg_image $new_image";
        $crowd_index = exec($py_command);

        return $crowd_index;
    }
}
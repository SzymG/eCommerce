<?php

namespace frontend\components;

use yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\Json;

class User extends \common\models\ar\User implements IdentityInterface {

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_token' => $token]);
    }
}
<?php

namespace common\tests\fixtures;

use yii\test\ActiveFixture;

class UserRoleFixture extends ActiveFixture {
    
    public $modelClass = 'common\models\ar\UserRole';
    public $dataFile = 'common\tests\_data\user-role.php';
    
}
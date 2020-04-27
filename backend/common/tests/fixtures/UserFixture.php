<?php

namespace common\tests\fixtures;

use yii\test\ActiveFixture;

class UserFixture extends ActiveFixture {
    
    public $modelClass = 'common\models\ar\User';
    public $dataFile = 'common\tests\_data\user.php';
    
}
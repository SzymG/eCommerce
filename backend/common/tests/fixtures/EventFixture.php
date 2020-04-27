<?php

namespace common\tests\fixtures;

use yii\test\ActiveFixture;

class EventFixture extends ActiveFixture {
    
    public $modelClass = 'common\models\ar\Event';
    public $dataFile = 'common\tests\_data\event.php';
    
}
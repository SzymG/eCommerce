<?php
namespace common\helpers;

use yii\helpers\Json;

class ArrayHelper extends \yii\helpers\ArrayHelper {
    
    public function convertObjectToArray($obj) {
        return Json::decode(Json::encode($obj), true); 
    }
    
}
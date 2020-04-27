<?php

namespace frontend\components;

use Yii;

/**
 * @inheritdoc
 */
abstract class RepositorySql {	
    
    protected $tableName;
    
    public function __construct() {
        
    }
	
    public function insert($fields) {
        return Yii::$app->db->createCommand()->insert($this->tableName, $fields)->execute();
    }
    
    public function update($condition, $fields) {
        return Yii::$app->db->createCommand()->update($this->tableName, $fields, $condition)->execute();
    }
    
    public function delete($condition) {
        return Yii::$app->db->createCommand()->delete($this->tableName, $condition)->execute();
    }
}

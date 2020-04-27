<?php

namespace console\components;

use yii\db\Query;
class Migration extends \yii\db\Migration {
    
    public function createTable($table, $columns, $options = null) {
        $tableOptions = '';
        
        if(empty($options)) {
            if($this->db->driverName === 'mysql') {
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            }
        }
        
        parent::createTable($table, $columns, $tableOptions);
    }
    
    public function getLanguageId($symbol) {
        return (new Query())->select(['id'])->from('language')->where(['symbol' => $symbol])->scalar();
    }
}

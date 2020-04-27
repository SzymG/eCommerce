<?php

use console\components\Migration;

class m190710_091637_create_table_user_action extends Migration {

    public function safeUp() {
        $this->createTable('user_action', [
            'id' => $this->primaryKey(11),
            'user_id' => $this->integer(11)->notNull(),
            'ip_address' => $this->string(50)->null(),
            'date_creation' => $this->timestamp()->notNull(),
        ]);
        
        $this->addForeignKey('fk_user_action_user', 'user_action', 'user_id', 'user', 'id');
        $this->alterColumn('user_action', 'date_creation', 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
    }

    public function safeDown() {
        $this->dropTable('user_action');
    }
}

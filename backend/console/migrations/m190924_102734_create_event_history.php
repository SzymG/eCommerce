<?php

use console\components\Migration;

class m190924_102734_create_event_history extends Migration {

    public function safeUp() {
        $this->createTable('event_history', [
            'id' => $this->primaryKey(11),
            'event_id' => $this->integer(11)->notNull(), // specjalnie bez klucza obcego
            'user_id' => $this->integer(11)->notNull(),
            'data_before' => $this->text()->null(),
            'data_after' => $this->text()->null(),
            'date_creation' => $this->timestamp()->notNull(),
        ]);
        
        $this->alterColumn('event_history', 'date_creation', 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
    }

    public function safeDown() {
        $this->dropTable('event_history');
    }
}

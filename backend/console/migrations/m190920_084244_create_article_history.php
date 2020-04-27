<?php

use console\components\Migration;

class m190920_084244_create_article_history extends Migration {

    public function safeUp() {
        $this->createTable('article_history', [
            'id' => $this->primaryKey(11),
            'article_id' => $this->integer(11)->notNull(), // specjalnie bez klucza obcego
            'user_id' => $this->integer(11)->notNull(),
            'data_before' => $this->text()->null(),
            'data_after' => $this->text()->null(),
            'date_creation' => $this->timestamp()->notNull(),
        ]);
        
        $this->alterColumn('article_history', 'date_creation', 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
    }

    public function safeDown() {
        $this->dropTable('article_history');
    }
}

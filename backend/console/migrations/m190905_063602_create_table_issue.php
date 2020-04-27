<?php

use console\components\Migration;

class m190905_063602_create_table_issue extends Migration {

    public function safeUp() {
        $this->createTable('issue', [
            'id' => $this->primaryKey(),
            'message' => $this->text()->notNull(),
            'timestamp' => $this->timestamp(),
            'url' => $this->string(1024)->notNull(),
            'errors' => $this->string(1024),
            'image' => 'MEDIUMTEXT',
            'agent' => $this->string(512),
            'cookies' => $this->string(1024),
            'platform' => $this->string(64),
            'screen_size' => $this->string(128),
            'available_screen_size' => $this->string(128),
            'inner_size' => $this->string(128),
            'color_depth' => $this->integer(11),
            'orientation' => $this->string(128),
            'date_creation' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ]);

    }

    public function safeDown() {
        $this->dropTable('issue');
    }
}

<?php

use console\components\Migration;

class m190923_111213_add_column_delete_key_to_user_table extends Migration {

    public function safeUp() {
        $this->addColumn('user', 'delete_key', $this->string(256)->null()->defaultValue(NULL));
    }

    public function safeDown() {
        $this->dropColumn('user', 'delete_key');
    }
}

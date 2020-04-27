<?php

use console\components\Migration;

class m190726_073944_change_user_default_active extends Migration {

    public function safeUp() {
        $this->alterColumn('user', 'is_active', $this->boolean()->notNull()->defaultValue(false));
    }

    public function safeDown() {
        $this->alterColumn('user', 'is_active', $this->boolean()->notNull()->defaultValue(true));
    }
}

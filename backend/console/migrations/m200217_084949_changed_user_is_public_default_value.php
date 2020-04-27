<?php

use console\components\Migration;

class m200217_084949_changed_user_is_public_default_value extends Migration {

    public function safeUp() {
        $this->alterColumn('user', 'is_public', $this->boolean()->notNull()->defaultValue(0));
    }

    public function safeDown() {
        
    }
}

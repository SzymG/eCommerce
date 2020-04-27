<?php

use console\components\Migration;

class m190812_091440_make_user_public_on_default extends Migration {

    public function safeUp() {
        $this->alterColumn('user', 'is_public', $this->boolean()->notNull()->defaultValue(true));
    }

    public function safeDown() {
        $this->alterColumn('user', 'is_public', $this->boolean()->notNull()->defaultValue(false));
    }
}

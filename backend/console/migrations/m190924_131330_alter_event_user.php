<?php

use console\components\Migration;

class m190924_131330_alter_event_user extends Migration {

    public function safeUp() {
        $this->addColumn('event_user', 'is_interested', 'TINYINT(1) NOT NULL');
    }

    public function safeDown() {
        $this->dropColumn('event_user', 'is_interested');
    }
}

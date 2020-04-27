<?php

use console\components\Migration;

class m190710_100718_alter_table_user extends Migration {

    public function safeUp() {
        $this->alterColumn('user', 'region_id', $this->integer(11));
        $this->alterColumn('user', 'career', $this->string(256));
        $this->alterColumn('user', 'first_name', $this->string(128));
        $this->alterColumn('user', 'last_name', $this->string(128));
        $this->addColumn('user', 'verification_code', $this->integer(6));
        $this->addColumn('user_action', 'action', $this->string(64)->notNull());
        $this->addPrimaryKey('pk_user_role', 'user_role', ['user_id', 'role_id']);
    }

    public function safeDown() {
        $this->dropColumn('user', 'verification_code');
        $this->dropColumn('user_action', 'action');
    }
}

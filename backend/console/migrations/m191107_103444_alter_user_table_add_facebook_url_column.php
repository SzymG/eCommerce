<?php

use console\components\Migration;

class m191107_103444_alter_user_table_add_facebook_url_column extends Migration {

    public function safeUp() {
        $this->addColumn('user', 'facebook_url', $this->string(128));

    }

    public function safeDown() {
        $this->dropColumn('user', 'facebook_url');
        
    }
}

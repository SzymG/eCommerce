<?php

use console\components\Migration;

class m191118_092519_add_column_url_photo_to_rank_table extends Migration {

    public function safeUp() {
        $this->addColumn('rank', 'url_icon', $this->string(256)->null()->defaultValue(NULL));
    }

    public function safeDown() {
        $this->dropColumn('rank', 'url_icon');
    }
}

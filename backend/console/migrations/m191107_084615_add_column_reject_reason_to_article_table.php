<?php

use console\components\Migration;

class m191107_084615_add_column_reject_reason_to_article_table extends Migration {

    public function safeUp() {
        $this->addColumn('article', 'reject_reason', $this->string(256)->null()->defaultValue(NULL));
    }

    public function safeDown() {
        $this->dropColumn('article', 'reject_reason');
    }
}

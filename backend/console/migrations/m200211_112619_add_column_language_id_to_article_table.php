<?php

use console\components\Migration;

class m200211_112619_add_column_language_id_to_article_table extends Migration {

    public function safeUp() {
        $this->addColumn('article', 'language_id', $this->integer(11)->defaultValue(null));
    }

    public function safeDown() {
        $this->dropColumn('article', 'language_id');
    }
}

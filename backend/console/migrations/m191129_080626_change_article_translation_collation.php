<?php

use console\components\Migration;

class m191129_080626_change_article_translation_collation extends Migration {

    public function safeUp() {
        $this->execute('ALTER TABLE article_translation CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }

    public function safeDown() {
        $this->execute('ALTER TABLE article_translation CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci');
    }
}
